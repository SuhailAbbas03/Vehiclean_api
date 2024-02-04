<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'mobile_no',
        'service_type',
        'date',
        'time' => 'string',
        'vehicle_no',
        'location_lat',
        'location_long',
        'package_cost',
        'service_charge',
        'tax',
        'status',
        'assign_to',
        'review',
        'rating',
        'partner_tip',
    ];
}
