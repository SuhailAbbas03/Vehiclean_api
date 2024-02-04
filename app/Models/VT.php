<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VT extends Model
{
    use HasFactory;
    protected $table = '_v_c_t';

    protected $fillable = [
        'Title',
        'Status',
    ];
}
