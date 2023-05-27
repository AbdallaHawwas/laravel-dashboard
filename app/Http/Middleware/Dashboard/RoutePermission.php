<?php

namespace App\Http\Middleware\Dashboard;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class RoutePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $name = $request->route()->getName();

        if (! $name || $this->hasPermissionTo($name)) {
            return $next($request);
        }

        abort(403);
    }

    /**
     * Check if the current admin has permission to the given route.
     */
    protected function hasPermissionTo(string $route): bool
    {
        $key = 'permission.' . auth()->id() . '.' . $route;

        return cache()->rememberForever($key, function () use ($route) {
            return Permission::whereName($route)->doesntExist() || Gate::allows($route);
        });
    }
}
