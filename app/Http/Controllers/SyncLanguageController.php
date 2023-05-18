<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class SyncLanguageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function update(string $locale)
    {
        Artisan::call('localize', ['language' => strtolower($locale)]);

        return redirect()->back()->with('success', __('The language files have been synchronized.'));
    }
}
