<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerDailyVehicle;

class PartnerDailyVehicleController extends Controller
{
    public function getPartnerDailyVehicleByMobileNo($mobile_no)
    {
        $PartnerDailyVehicle = PartnerDailyVehicle::where('mobile_no', $mobile_no)->first();

        if (!$PartnerDailyVehicle) {
            return response()->json(['message' => 'PartnerDailyVehicle not found'], 404);
        }

        return response()->json(['message' => 'PartnerDailyVehicle retrieved successfully', 'customer' => $PartnerDailyVehicle]);
    }
}
