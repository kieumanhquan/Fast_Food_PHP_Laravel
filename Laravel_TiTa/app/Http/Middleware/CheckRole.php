<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        $roles = $this->getRequiredRoleForRoute($request->route());
        if ($request->uses()->hasRole($roles) || !$roles){
            return $next($request);
        }
        return redirect()->route('nPermission');
    }
    public function getRequiredRoleForRoute($route){
        $action = $route->getAction();
        return isset($action['roles']) ? $action['roles']:null;
    }
}
