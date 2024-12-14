<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Association extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;


    protected $fillable = [

        'user_name',
        'password',
        'company_email',
        'registrant_name',
        'subscriber_email',
        'phone_number',
        'registered_phone_number',
        'address',

        'website',
        'avatar',
        'is_active',
        'is_open',
        'company_name',
        'is_master',
    ];
}
