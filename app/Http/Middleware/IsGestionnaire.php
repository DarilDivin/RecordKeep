<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsGestionnaire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userRoles = Auth::user()->roles->pluck('id', 'name')->toArray();
        foreach ($userRoles as $role => $id) {
            if (array_key_exists('Gestionnaire', $userRoles)){
                return $next($request);
            }
            else{
                abort(403);
            }
        }
    }
}
