<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('language.index', [
            'languages' => config('app.locales'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $locale)
    {
        if (! File::exists(lang_path($locale . '.json'))) {
            return redirect()->route('language.index')->with('error', __('The language file does not exist!'));
        }

        $translations = json_decode(File::get(lang_path($locale . '.json')));

        return view('language.edit', [
            'locale' => $locale,
            'translations' => $translations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $locale)
    {
        $locale = strtolower($locale);

        $flags = JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;
        File::put(lang_path($locale . '.json'), json_encode($request->get('translations'), $flags));

        return redirect()->back()->with('success', __('The language files have been updated!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $locale)
    {
        $locale = strtolower($locale);

        if (! in_array($locale, config('app.locales'))) {
            return abort(404);
        }

        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
