<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyCleaning;
use Illuminate\Http\JsonResponse;

class DailyCleaningController extends Controller
{
    public function index(): JsonResponse
    {
        $vehicleTypes = DailyCleaning::all();
    
        return response()->json(['data' => $vehicleTypes]);
    }
}
