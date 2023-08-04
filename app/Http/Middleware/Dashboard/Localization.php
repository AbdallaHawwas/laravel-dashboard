<?php

namespace App\Http\Middleware\Dashboard;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('dashboard_locale')) {
            $locale = session()->get('dashboard_locale');

            if (! in_array($locale, config('app.dashboard_locales'))) {
                $fallback = Arr::first(config('app.dashboard_locales'));

                session()->put('dashboard_locale', $fallback);
            }

            app()->setLocale(session()->get('dashboard_locale'));
        }

        return $next($request);
    }
}
