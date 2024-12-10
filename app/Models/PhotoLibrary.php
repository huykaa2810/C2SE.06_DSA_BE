<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoLibrary extends Model
{
    use HasFactory;
    protected $table = 'photo_libraries';

    protected $fillable = [
        'image',
        'title',
        'is_open',
    ];
}
