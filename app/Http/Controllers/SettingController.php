<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $settings = auth()->user()->settings;
       return Inertia::render('Settings/Index', compact('settings'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'display_suggestion_term' => 'required|boolean',
            'display_collection' => 'required|boolean',
            'display_product' => 'required|boolean',
            'max_results' => 'required|integer|min:1|max:50',
        ]);

        foreach ($validated as $key => $value) {
            $user->settings()->updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
        return redirect()->route('settings.index');
    }
}
