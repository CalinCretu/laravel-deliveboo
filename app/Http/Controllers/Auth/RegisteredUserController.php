<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{

    public function dashboard(string $slug)
    {
        $user = Auth::user();
        if ($slug ==  $user->slug) {
            $currentYear = date('Y');
            $user_id = $user->id;
            $items = Item::where('user_id', '=', $user_id)->get();
            $last_items = Item::where('user_id', '=', $user_id)->orderBy('id', 'desc')->take(5)->get();
            $orders = Order::where('user_id', '=', $user_id)->get();
            $dataMonths = [];
            for ($i = 0; $i < 12; $i++) {
                $dataMonths[$i] = Order::whereYear('order_date', $currentYear)->whereMonth('order_date', $i + 1)->count();
            };
            return view('dashboard', compact('items', 'user', 'last_items', 'orders', 'currentYear', 'dataMonths'));
        } else {
            return view('admin.errors.error');
        }
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $types = Type::orderBy('name', 'asc')->get();

        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'business_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string',],
            'vat_id' => ['required', 'string', 'min:13', 'max:13', 'unique:'  . User::class],
            'restaurant_img' => 'required|max:2048|file'
        ]);

        $users_slug = User::pluck('slug')->toArray();
        $img_path = Storage::put('restaurants_img', $request->restaurant_img);

        $data = $request->all();
        $data['slug'] = Str::slug($data['business_name']);
        $i = 1;
        if (in_array($data['slug'], $users_slug)) {
            while (in_array($data['slug'] . $i, $users_slug)) {
                $i++;
            };
            $data['slug'] .= $i;
        };
        $data['restaurant_img'] = $img_path;
        $user = User::create($data);

        $user->types()->attach($request->types);

        event(new Registered($user));

        Auth::login($user);
        $items = Item::where('user_id', '=', $user->id)->get();
        $orders = Order::where('user_id', '=', $user->id)->get();
        // return redirect(RouteServiceProvider::HOME);
        return redirect()->route('dashboard', ['slug' => $user->slug, 'items' => $items, 'orders' => $orders]);
    }
}
