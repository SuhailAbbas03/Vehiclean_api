<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = 'offer';

    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
        'start_date',
        'end_date',
        'discount_percentage',
    ];
}
