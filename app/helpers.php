<?php

if (! function_exists('dashboard_view')) {
    /**
     * Render a view from the dashboard views folder.
     *
     * @param  string|null  $view
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $data
     * @param  array  $mergeData
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    function dashboard_view($view = null, $data = [], $mergeData = [])
    {
        return view('dashboard.' . $view, $data, $mergeData);
    }
}

if (! function_exists('website_view')) {
    /**
     * Render a view from the website views folder.
     *
     * @param  string|null  $view
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $data
     * @param  array  $mergeData
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    function website_view($view = null, $data = [], $mergeData = [])
    {
        return view('website.' . $view, $data, $mergeData);
    }
}
