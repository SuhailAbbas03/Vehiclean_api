<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\vehicle_brand; 
use Illuminate\Http\JsonResponse;


class VehicleBrandController extends Controller 
{
    public function index()
    {
        $vehicleBrands = vehicle_brand::all(); 

        return response()->json(['data' => $vehicleBrands]);
    }
}
