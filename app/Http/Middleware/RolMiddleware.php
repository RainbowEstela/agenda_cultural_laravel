<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        $rolUser = $request->user()->rol;
        $roles = explode("|", $roles);
        $hasAccess = false;

        foreach ($roles as $rol) {
            if ($rol == $rolUser) {
                $hasAccess = true;
            }
        }

        if ($hasAccess) {
            return $next($request);
        } else {
            return redirect(route('home'));
        }
    }
}
