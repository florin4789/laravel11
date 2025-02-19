<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use Carbon\Carbon;

class VisitController extends Controller {
    public function trackVisit(Request $request) {
        $request->validate([
            'visitor_id' => 'required|string',
            'page_url' => 'required|url',
            'timestamp' => 'required|date'
        ]);

        Visit::create([
            'visitor_id' => $request->visitor_id,
            'page_url' => $request->page_url,
            'visited_at' => Carbon::parse($request->timestamp)
        ]);

        return response()->json(['message' => 'Visit tracked'], 200);
    }

    public function getAnalytics() {

        $data = Visit::selectRaw('page_url, COUNT(DISTINCT visitor_id) as unique_visits')
            ->groupBy('page_url')
            ->get();

        return view('admin.analytics', compact('data'));
    }
}

