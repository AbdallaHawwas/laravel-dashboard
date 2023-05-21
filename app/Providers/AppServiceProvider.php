<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Redot\LivewireDatatable\Datatable;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /* Register components namespace */
        Blade::anonymousComponentPath(resource_path('components'), 'components');
        Blade::componentNamespace('App\\View\\Components', 'components');

        /* Register layouts namespace */
        Blade::anonymousComponentPath(resource_path('layouts'), 'layouts');
        Blade::componentNamespace('App\\View\\Layouts', 'layouts');

        /* Use custom pagination view */
        Paginator::defaultView('components.pagination');

        /* Add can method to datatable */
        Datatable::macro('can', function ($route) {
            return Permission::whereName($route)->doesntExist() || Gate::allows($route);
        });
    }
}
