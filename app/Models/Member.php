<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';

    protected $fillable = [

        'username',
        'password',
        'company_email',
        'registrant_name',
        'subscriber_email',
        'phone_number',
        'registered_phone_number',
        'address',

        'website',

        'is_active',
        'is_open',
        'company_name',
        'is_master',
    ];
}
