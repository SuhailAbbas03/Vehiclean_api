<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Partner extends Model
{
    use HasFactory,HasApiTokens;


    protected $fillable = [
        'name',
        'mobile_no',
        'email',
        'password',
        'app_token',
        'status',
        'permanent_address',
        'current_address',
        'profile_photo',
        'fi_status',
        'kyc_status',
        'photo_aadhar_front',
        'photo_aadhar_back',
        'police_verification_document',
        'current_city',
        'current_pin_code',
        'current_state',
        'permanent_city',
        'permanent_pin_code',
        'permanent_state',
        'country',
        'profile_pic',
        'job_type',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // You can define relationships, additional methods, etc. here as needed
}
