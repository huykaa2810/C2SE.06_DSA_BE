<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;
    protected $tabletable = 'trackings';
    protected $fillable = [
        'date',
        'visit_count',
    ];
}
