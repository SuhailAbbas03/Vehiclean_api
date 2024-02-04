<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerController extends Controller
{

    public function index()
    {
        
        $customers = Customer::all(); 

        
        return response()->json(['data' => $customers]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'Name' => 'required|string',
            'Mobile_No' => 'required|numeric|digits:10|unique:customers',
            'Email_Id' => 'required|email|unique:customers',
            'Password' => 'required|string|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
        ]);


        $customer = Customer::create([
            'Name' => $request->input('Name'),
            'Mobile_No' => $request->input('Mobile_No'),
            'Email_Id' => $request->input('Email_Id'),
            'Password' => Hash::make($request->input('Password')),
            'App_Token' => $request->input('App_Token'),
            'Status' => 'active',
        ]);

        return response()->json(['message' => 'Customer registered successfully', 'data' => $customer], 201);
    }


    public function login(Request $request)
    {
        $request->validate([
            'Mobile_No' => 'required|string',
            'Password' => 'required|string',
        ]);

        $customer = Customer::where('Mobile_No', $request->input('Mobile_No'))->first();

        if (!$customer || !Hash::check($request->input('Password'), $customer->Password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $customer->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => 'Customer Login successful',
            'token' => $token,
            'customer' => $customer,
        ]);
    }

    public function updateAppToken(Request $request)
    {
        $request->validate([
            'Mobile_No' => 'required|string',
            'App_Token' => 'required|string',
        ]);

        $customer = Customer::where('Mobile_No', $request->input('Mobile_No'))->first();

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->update(['App_Token' => $request->input('App_Token')]);

        return response()->json(['message' => 'App Token updated successfully']);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'Mobile_No' => 'required|string',
            'Password' => 'required|string|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'old_password' => 'sometimes|string', // only validate if provided
        ]);

        $customer = Customer::where('Mobile_No', $request->input('Mobile_No'))->first();

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        // Check if the old password is provided and matches the current plain text password
        if ($request->has('old_password') && $request->input('old_password') !== $customer->password) {
            return response()->json(['message' => 'Invalid old password'], 401);
        }

        // Update the password with the new plain text password
        $customer->update(['Password' => $request->input('Password')]);

        return response()->json(['message' => 'Password updated successfully']);
    }

    public function getCustomerByMobileNo($mobile_no)
    {
        $customer = Customer::where('mobile_no', $mobile_no)->first();

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json(['message' => 'Customer retrieved successfully', 'customer' => $customer]);
    }

    public function forgetPassword(Request $request)
    {
        $request->validate([
            'Mobile_No' => 'required|string',
            'new_password' => 'required|string|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
        ]);

        $customer = Customer::where('Mobile_No', $request->input('Mobile_No'))->first();

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        // Encrypt the new password
        $hashedPassword = Hash::make($request->input('new_password'));

        // Update the password in the database
        $customer->update(['Password' => $hashedPassword]);

        return response()->json(['message' => 'Password updated successfully']);
    }
}
