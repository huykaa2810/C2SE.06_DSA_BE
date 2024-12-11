<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigBanners extends Model
{
    use HasFactory;
    protected $table = 'config_banners';

    protected $fillable = [

        'image',
        'priority',
        'is_open',

    ];

    
}
