<?php

namespace App\Http\Middleware\Website;

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
        if (session()->has('website_locale')) {
            $locale = session()->get('website_locale');

            if (! in_array($locale, config('app.website_locales'))) {
                $fallback = Arr::first(config('app.website_locales'));

                session()->put('website_locale', $fallback);
            }

            app()->setLocale(session()->get('website_locale'));
        }

        return $next($request);
    }
}
