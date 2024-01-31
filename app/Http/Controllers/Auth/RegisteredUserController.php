<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            'vat_id' => ['required', 'string', 'min:13', 'max:13'],
            'restaurant_img' => 'nullable|max:2048|file'
        ]);

        // dd($request);

        $img_path = Storage::put('upload', $request->restaurant_img);

        $user = User::create([
            'business_name' => $request->business_name,
            'slug' => Str::slug($request->business_name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'vat_id' => $request->vat_id,
            'restaurant_img' => $img_path,
        ]);

        $user->types()->attach($request->types);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
