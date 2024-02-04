<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyCleaning extends Model
{
    use HasFactory;

    protected $table = '_daily_cleaning'; 

    protected $fillable = [
        'Title',
        'Description',
        'Price',
        'Status',
        'Vehicle_type',
        'Validity',
    ];
}
