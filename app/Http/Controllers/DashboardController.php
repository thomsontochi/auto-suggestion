<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\SuggestionTerm;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard');
    }

    public function autoSuggest(Request $request)
    {
        $term = $request->input('term');
        $user = auth()->user();

        $settings = $user->settings()->pluck('value', 'key')->toArray();
        $maxResults = $settings['max_results'] ?? 10;

        $results = [
            'terms' => $settings['display_suggestion_term'] === 'true' ? SuggestionTerm::where('term', 'like', "%{$term}%")->limit($maxResults)->get() : [],
            'collections' => $settings['display_collection'] === 'true' ? $user->collections()->where('title', 'like', "%{$term}%")->limit($maxResults)->get() : [],
            'products' => $settings['display_product'] === 'true' ? $user->products()->where('title', 'like', "%{$term}%")->limit($maxResults)->get() : [],
        ];

        // Log the search
        $user->searchLogs()->create(['term' => $term]);

        return response()->json($results);
    }
}
