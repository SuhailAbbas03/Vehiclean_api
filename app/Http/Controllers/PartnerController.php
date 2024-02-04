<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRegisterRequest;
use App\Http\Requests\PartnerLoginRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();

        return response()->json(['partners' => $partners]);
    }
    public function register(PartnerRegisterRequest $request)
    {
        $data = $request->only(['name', 'mobile_no', 'email', 'password']);

        $data['password'] = Hash::make($data['password']);

        $partner = Partner::create($data);

        return response()->json(['message' => 'Partner registered successfully', 'partner' => $partner]);
    }



    public function login(PartnerLoginRequest $request)
    {
        $request->validate([
            'mobile_no' => 'required|string',
            'password' => 'required|string',
        ]);

        $partner = Partner::where('mobile_no', $request->input('mobile_no'))->first();

        if (!$partner || !Hash::check($request->input('password'), $partner->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $partner->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => 'Partner Login successful',
            'token' => $token,
            'partner' => [
                'id' => $partner->id,
                'name' => $partner->name,
                'mobile_no' => $partner->mobile_no,
                // Include only the necessary fields here
            ],
        ]);
    }
    public function getPartnerByMobileNo($mobile_no)
    {
        $partner = Partner::where('mobile_no', $mobile_no)->first();

        if (!$partner) {
            return response()->json(['message' => 'Partner not found'], 404);
        }

        return response()->json(['message' => 'Partner retrieved successfully', 'partner' => $partner]);
    }

    public function updateAppToken(Request $request)
    {
        $request->validate([
            'mobile_no' => 'required|string',
            'app_token' => 'required|string',
        ]);

        $partner = Partner::where('mobile_no', $request->input('mobile_no'))->first();

        if (!$partner) {
            return response()->json(['message' => 'Partner not found'], 404);
        }

        // Use the fill method to update specific fields
        $partner->fill(['app_token' => $request->input('app_token')]);
        $partner->save();

        return response()->json(['message' => 'App Token updated successfully']);
    }

    public function forgetPassword(Request $request)
    {
        $request->validate([
            'mobile_no' => 'required|string',
            'new_password' => 'required|string|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
        ]);

        $partner = Partner::where('mobile_no', $request->input('mobile_no'))->first();

        if (!$partner) {
            return response()->json(['message' => 'Partner not found'], 404);
        }

        // Encrypt the new password
        $hashedPassword = Hash::make($request->input('new_password'));

        // Update the password in the database
        $partner->update(['password' => $hashedPassword]);

        return response()->json(['message' => 'Password updated successfully']);
    }

}
