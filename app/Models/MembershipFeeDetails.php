<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipFeeDetails extends Model
{
    use HasFactory;
    protected $table = ' membership_fee_details';
    protected $fillable = [

        'amount_id',
        'member_id',
        'status',
        'amount',

    ];
}
