<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'category_id',
        'member_id',
        'title',
        'content',
        'image',
        'is_open',
        'view',
    ];
    public function association()
    {
        return $this->belongsTo(Association::class, 'member_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
