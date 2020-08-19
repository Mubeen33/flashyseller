<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //custom
        switch ($guard) {
            case 'vendor':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('vendor.dashboard.get');
                }
                break;
            
            default:
                // if (Auth::guard($guard)->check()) {
                //     return redirect('/home');
                // }
                //not authenticate
                return redirect('/');
                break;
        }

        return $next($request);



        /* default
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
        */
    }
}
