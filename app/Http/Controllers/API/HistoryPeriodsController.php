<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HistoryPeriods;
use Illuminate\Http\JsonResponse;

class HistoryPeriodsController extends Controller
{
    public function index(): JsonResponse
    {
        $periods = HistoryPeriods::all();
        return response()->json($periods);
    }
}
