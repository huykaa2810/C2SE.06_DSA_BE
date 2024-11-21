<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        
        'title',
        'image',
        'content',
        'event_date',
        'location',
        'end_date',
        'organizer_id',
        'status',

    ];
}
