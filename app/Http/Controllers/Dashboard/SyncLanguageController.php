<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Artisan;

class SyncLanguageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function update(string $locale)
    {
        Artisan::call('localize', ['language' => strtolower($locale)]);

        return redirect()->route('dashboard.language.index')->with('success', __(':resource has been updated.', ['resource' => __('Language')]));
    }
}
