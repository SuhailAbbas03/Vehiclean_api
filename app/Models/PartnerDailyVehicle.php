<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerDailyVehicle extends Model
{
    use HasFactory;
    protected $table = 'partner__daily__vehicle';
    
    protected $fillable = [
        'customer_mobile_no',
        'customer_name',
        'society_id',
        'society_name',
        'parking_slot',
        'vehicle_no',
        'time',
        'internal_cleaning_day',
        'package_type_id',
        'package_name',
        'partner_id',
        'partner_name',
        'status',
        'start_date',
        'end_date',
        'stop_reason',
    ];
}
