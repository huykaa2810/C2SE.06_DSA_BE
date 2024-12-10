<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;
    protected $table = 'associations';

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
