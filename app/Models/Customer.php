<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [

        'user_name',
        'password',
        'registrant_name',
        'subscriber_email',
        'phone_number',
        'address',
        'is_active',
        'is_open',
        'is_member',
    ];
}
