<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle_brand extends Model
{
    use HasFactory;

    protected $table = 'vehicle_brand'; 
    protected $fillable = [
        'Title',
        'Status',
        'Photo',
    ];

}
