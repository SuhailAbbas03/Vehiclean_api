<?php

namespace App\Http\Controllers;

use App\Models\societies;

use Illuminate\Http\JsonResponse;

class SocietiesController extends Controller
{
    public function index(): JsonResponse
    {
        $societies = societies::all(); // Corrected model name

        return response()->json(['data' => $societies]);
    }
}
