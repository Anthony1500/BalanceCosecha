<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      /*  // Lista de rutas que se deben excluir
        $excludedRoutes = ['LoginForm', '/loadscreen', '/','auth.login','auth.register','/RegisterForm'];

        if (!$request->session()->has('identificacion') && !in_array($request->route()->getName(), $excludedRoutes)) {
            return redirect('LoginForm')->with('message', 'Sesión expirada o cerrada');
        }
*/
        return $next($request);
    }
}
