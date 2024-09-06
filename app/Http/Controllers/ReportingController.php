<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportingController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $searchLogs = $user->searchLogs()->latest()->paginate(6);
        $uniqueSearchTermsCount = $user->searchLogs()->distinct('term')->count();
    
        $topSearchTerms = $user->searchLogs()
            ->select('term', DB::raw('count(*) as count'))
            ->groupBy('term')
            ->orderByDesc('count')
            ->limit(5)
            ->get();
    
        $searchVolumeByDay = $user->searchLogs()
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('count', 'date')
            ->toArray();
    
        return Inertia::render('Reporting/Index', compact('searchLogs', 'uniqueSearchTermsCount', 'topSearchTerms', 'searchVolumeByDay'));
    }
}
