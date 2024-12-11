<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable =[

        'category_name',
        'parent_category_id',
        'is_open',
    ];


    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}


