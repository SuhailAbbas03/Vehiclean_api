<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyAttendance;

class DailyAttendanceController extends Controller
{
    // Index method to retrieve all records
    public function index()
    {
        $dailyAttendances = DailyAttendance::all();

        return response()->json(['dailyAttendances' => $dailyAttendances]);
    }

    // Create method to store a new record
    public function create(Request $request)
    {
        $request->validate([
            'Partner_Id' => 'required',
            'Partner_Name' => 'required',
            'Attend_On_Date' => 'required|date',
            'Attend_Signin_Time' => 'required',
            'Attend_Signout_Time' => 'required',
        ]);

        $dailyAttendance = DailyAttendance::create([
            'Partner_Id' => $request->input('Partner_Id'),
            'Partner_Name' => $request->input('Partner_Name'),
            'Attend_On_Date' => $request->input('Attend_On_Date'),
            'Attend_Signin_Time' => $request->input('Attend_Signin_Time'),
            'Attend_Signout_Time' => $request->input('Attend_Signout_Time'),
        ]);

        return response()->json(['message' => 'Attendance details added successfully', 'attendance' => $dailyAttendance]);
    }

    

    // Update method to update a specific record
    public function update(Request $request, $id)
    {
        $request->validate([
            'Partner_Id' => 'required',
            'Partner_Name' => 'required',
            'Attend_On_Date' => 'required|date',
            'Attend_Signin_Time' => 'required',
            'Attend_Signout_Time' => 'required',
        ]);

        $dailyAttendance = DailyAttendance::findOrFail($id);
        $dailyAttendance->update([
            'Partner_Id' => $request->input('Partner_Id'),
            'Partner_Name' => $request->input('Partner_Name'),
            'Attend_On_Date' => $request->input('Attend_On_Date'),
            'Attend_Signin_Time' => $request->input('Attend_Signin_Time'),
            'Attend_Signout_Time' => $request->input('Attend_Signout_Time'),
        ]);

        return response()->json(['message' => 'Attendance details updated successfully', 'attendance' => $dailyAttendance]);
    }

    
}
