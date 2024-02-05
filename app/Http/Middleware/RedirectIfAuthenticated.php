<?php

namespace App\Http\Middleware;

use App\Models\Item;
use App\Models\Order;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);

                $user = Auth::user();
                $items = Item::where('user_id', '=', $user->id)->get();
                $orders = Order::where('user_id', '=', $user->id)->get();
                return redirect()->route('dashboard', ['slug' => $user->slug, $items, $orders]);
            }
        }

        return $next($request);
    }
}
