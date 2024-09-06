<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    // public function index()
    // {
    //     $settings = Auth::user()->settings()->pluck('value', 'key')->toArray();
    //     // $settings = auth()->user()->settings;
    //     // dd($settings);
    //     return Inertia::render('Settings/Index', compact('settings'));
    // }

    // public function update(Request $request)
    // {
       
    //     $user = auth()->user();
    //     $validated = $request->validate([
    //         'display_suggestion_term' => 'required|boolean',
    //         'display_collection' => 'required|boolean',
    //         'display_product' => 'required|boolean',
    //         'max_results' => 'required|integer|min:1|max:50',
    //     ]);

    //     foreach ($validated as $key => $value) {
    //         $user->settings()->updateOrCreate(
    //             ['key' => $key],
    //             ['value' => $value]
    //         );
    //     }

    //     return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    // }

    public function index()
    {
        // dd( Auth::user());
        $settings = Auth::user()->settings ?? new Setting();
        return Inertia::render('Settings/Index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'display_suggestion_term' => 'required|boolean',
            'display_collection' => 'required|boolean',
            'display_product' => 'required|boolean',
            'max_results' => 'required|integer|min:1|max:50',
            'min_characters' => 'required|integer|min:1|max:5',
            'search_delay' => 'required|integer|min:100|max:1000',
            'enable_fuzzy_search' => 'required|boolean',
        ]);

        // dd($validated);

        $user = Auth::user();

        // $settings = $user->settings ?? new Setting();

        $settings = $user->settings()->first() ?? new Setting();

        if (!$settings->exists) {
            $settings->user_id = $user->id;
        }

        // $settings->user_id = $user->id;
        
        $settings->fill($validated);
        $settings->save();

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}