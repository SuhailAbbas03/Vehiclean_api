<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VT;
use Illuminate\Http\JsonResponse;

class VTController extends Controller
{
    
    public function index(): JsonResponse
    {
        $vehicleTypes = VT::all();
    
        return response()->json(['data' => $vehicleTypes]);
    }
}