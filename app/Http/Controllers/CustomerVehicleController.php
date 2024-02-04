<?php

namespace App\Http\Controllers;

use App\Models\CustomerVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CustomerVehicleController extends Controller
{
    public function addVehicle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required|integer',
            'vehicletype_id' => 'required|integer',
            'vehiclebrand_id' => 'required|integer',
            'registration_no' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Create a new customer vehicle
        $vehicle = CustomerVehicle::create([
            'mobile_no' => $request->input('mobile_no'),
            'vehicletype_id' => $request->input('vehicletype_id'),
            'vehiclebrand_id' => $request->input('vehiclebrand_id'),
            'registration_no' => $request->input('registration_no'),
            'status' => $request->input('status'),
        ]);

        return response()->json(['message' => 'Vehicle details added successfully', 'vehicle' => $vehicle]);
    }

    public function updateStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required|integer',
            'vehicletype_id' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Find the customer vehicle by mobile_no and vehicletype_id
        $vehicle = CustomerVehicle::where('mobile_no', $request->input('mobile_no'))
            ->where('vehicletype_id', $request->input('vehicletype_id'))
            ->first();

        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found'], 404);
        }

        // Update the status
        $vehicle->update(['status' => $request->input('status')]);

        return response()->json(['message' => 'Vehicle status updated successfully', 'vehicle' => $vehicle]);
    }


    public function updateVehicle(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required|integer',
            'vehicletype_id' => 'required|integer',
            'vehiclebrand_id' => 'required|integer',
            'registration_no' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Find the customer vehicle by ID
        $vehicle = CustomerVehicle::find($id);

        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found'], 404);
        }

        // Update the vehicle details
        $vehicle->update([
            'mobile_no' => $request->input('mobile_no'),
            'vehicletype_id' => $request->input('vehicletype_id'),
            'vehiclebrand_id' => $request->input('vehiclebrand_id'),
            'registration_no' => $request->input('registration_no'),
            'status' => $request->input('status'),
        ]);

        return response()->json(['message' => 'Vehicle details updated successfully', 'vehicle' => $vehicle]);
    }
    
    public function getCustomerVehicleByMobileNo($mobile_no)
    {
        $CustomerVehicle = CustomerVehicle::where('mobile_no', $mobile_no)->first();

        if (!$CustomerVehicle) {
            return response()->json(['message' => 'Customer Vehicle not found'], 404);
        }

        return response()->json(['message' => 'Customer Vehicle retrieved successfully', 'customer' => $CustomerVehicle]);
    }
    public function updateCustomerVehicleByMobileNo($mobile_no)
    {
        $updateCustomerVehicle = CustomerVehicle::where('mobile_no', $mobile_no)->first();

        if (!$updateCustomerVehicle) {
            return response()->json(['message' => 'Customer Vehicle not found'], 404);
        }

        return response()->json(['message' => 'update Customer Vehicle retrieved successfully', 'customer' => $updateCustomerVehicle]);
    }
    public function deleteVehicle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required|integer',
            'vehicletype_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Find the customer vehicle by mobile_no and vehicletype_id
        $vehicle = CustomerVehicle::where('mobile_no', $request->input('mobile_no'))
            ->where('vehicletype_id', $request->input('vehicletype_id'))
            ->first();

        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found'], 404);
        }

        // Delete the vehicle
        $vehicle->delete();

        return response()->json(['message' => 'Vehicle deleted successfully']);
    }
}
