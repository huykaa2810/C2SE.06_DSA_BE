<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigBanners extends Model
{
    use HasFactory;
    protected $table = 'configbanners';

    protected $fillable = [

        'url',
        'is_open',
    ];
}
