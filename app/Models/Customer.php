<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable = [
        'Name',
        'Mobile_No',
        'Email_Id',
        'Password',
        'App_Token',
        'Status',
    ];
}
