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

        $allowedOrigins = [
            env('FRONTEND_ENDPOINT', 'http://localhost:8080'),
            env('BACKEND_ENDPOINT', 'http://localhost:3000'),
            env('AMAGO_ENDPOINT', 'http://localhost'),
            env('EXTRA_ENDPOINT', 'http://127.0.0.1')
        ];

        if ($request->server('HTTP_ORIGIN')) {
            if (in_array($request->server('HTTP_ORIGIN'), $allowedOrigins)) {
                return $next($request)
                    ->header('Access-Control-Allow-Origin', $request->server('HTTP_ORIGIN'))
                    ->header('Access-Control-Allow-Origin', '*')
                    ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
                    ->header('Access-Control-Allow-Headers', '*');
            }
        }

        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
