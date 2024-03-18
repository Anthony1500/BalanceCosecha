<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('registro')->check()) {
            $currentRouteName = $request->route()->getName();
            $excludedRoutes = [
                'LoginForm',
                'loadscreen',
                'auth.login',
                'auth.register',
                'inicio',
                'loadscreen',
                'reset-password',
            ];
            if (!in_array($currentRouteName, $excludedRoutes)) {
                return redirect('LoginForm')->with('message', 'Sesión expirada o cerrada');
            }
        }

        return $next($request);
    }
}
