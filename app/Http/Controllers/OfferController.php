<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\JsonResponse;

class OfferController extends Controller
{
    public function index(): JsonResponse
    {
        
        $offers = Offer::all(); 

        // Return the offer data as JSON response
        return response()->json(['data' => $offers]);
    }
}

