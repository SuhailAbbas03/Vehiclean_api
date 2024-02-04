<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function createBooking(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required|integer',
            'service_type' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'vehicle_no' => 'required|string',
            'location_lat' => 'required|numeric',
            'location_long' => 'required|numeric',
            'package_cost' => 'required|numeric',
            'service_charge' => 'required|numeric',
            'tax' => 'required|numeric',
            'status' => 'required|string',
            'assign_to' => 'nullable|string',
            'review' => 'nullable|string',
            'rating' => 'nullable|integer',
            'partner_tip' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Create a new booking
        $booking = Booking::create($request->all());

        return response()->json(['message' => 'Booking created successfully', 'booking' => $booking]);
    }

    public function updateBookingStatus(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'mobile_no' => 'required|integer',
        'status' => 'required|in:active,inactive',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    $booking = Booking::where('id', $id)
        ->where('mobile_no', $request->input('mobile_no'))
        ->first();

    if (!$booking) {
        return response()->json(['message' => 'Booking not found'], 404);
    }

    $booking->update(['status' => $request->input('status')]);

    return response()->json(['message' => 'Booking status updated successfully', 'booking' => $booking]);
}

}
