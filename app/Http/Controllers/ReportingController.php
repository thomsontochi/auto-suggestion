<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportingController extends Controller
{
    public function index()
{
    $user = auth()->user();
    $searchLogs = $user->searchLogs()->latest()->paginate(20);
    $uniqueSearchTermsCount = $user->searchLogs()->distinct('term')->count();

    return Inertia::render('Reporting/Index', compact('searchLogs', 'uniqueSearchTermsCount'));
}
}
