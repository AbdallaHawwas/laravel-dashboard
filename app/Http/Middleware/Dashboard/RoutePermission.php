<?php

namespace App\Http\Middleware\Dashboard;

use Closure;
use Illuminate\Http\Request;
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

        if (! $name || Permission::where('name', $name)->doesntExist()) {
            return $next($request);
        }

        if ($request->user()->can($name)) {
            return $next($request);
        }

        abort(403);
    }
}
