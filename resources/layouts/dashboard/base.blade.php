<x-layouts::scaffold {{ $attributes }}>
    <div class="page">
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark d-print-none" style="overflow: auto">
            <div class="container-fluid">
                <a class="navbar-brand py-3 py-lg-5 px-2" href="{{ route('dashboard.index') }}">
                    <x-components::logo class="navbar-brand-img" height="24" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav">
                        @include('layouts.dashboard.partials.sidebar', ['items' => $sidebar])

                        <li class="nav-item mt-auto mb-md-2">
                            <a class="nav-link cursor-pointer" onclick="$('#logout-form').submit();">
                                <span class="nav-link-icon"><i class="ti ti-logout"></i></span>
                                <span class="nav-link-title">{{ __('Logout') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-fluid justify-content-between px-3">
                <div>
                    @isset($attributes['title'])
                        <a href="#" class="navbar-brand">{{ $attributes['title'] }}</a>
                    @endisset
                </div>

                <div class="navbar-nav flex-row order-md-last gap-2">
                    @if (count(config('app.locales')) > 1)
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle px-0" href="#" data-bs-toggle="dropdown">
                                <span class="nav-link-icon"><i class="ti ti-world"></i></span>
                                <span class="nav-link-title me-2">{{ __('languages.' . app()->getLocale()) }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                @foreach (config('app.locales') as $locale)
                                    <a class="dropdown-item" href="{{ route('dashboard.language.show', $locale) }}">
                                        <span class="nav-link-title">{{ __('languages.' . $locale) }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="d-flex">
                        <a data-theme="dark" class="nav-link px-0 hide-theme-dark cursor-pointer">
                            <i class="ti ti-moon"></i>
                        </a>

                        <a data-theme="light" class="nav-link px-0 hide-theme-light cursor-pointer">
                            <i class="ti ti-sun"></i>
                        </a>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown">
                            <x-components::avatar :user="$admin" />

                            <div class="d-none d-xl-block ps-2">
                                <div>{{ $admin->name }}</div>
                                <div class="mt-1 small text-muted">{{ $admin->email }}</div>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="{{ route('dashboard.profile.edit') }}" class="dropdown-item">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item cursor-pointer" onclick="$('#logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-fluid">
                    {{ $slot }}

                    <footer class="mt-4 text-muted text-center">
                        <div>
                            {{  __('All rights reserved for') }}
                            <a href="{{ config('app.url') }}" target="_blank">{{ config('app.name') }}</a>
                            &copy; {{ date('Y') }}
                        </div>
                        <div>
                            {{ __('Developed by') }}
                            <a href="https://github.com/redot-src" target="_blank">Redot</a>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</x-layouts::scaffold>
