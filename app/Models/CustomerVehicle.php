<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'mobile_no',
        'vehicletype_id',
        'vehiclebrand_id',
        'registration_no',
        'status',
    ];


}
