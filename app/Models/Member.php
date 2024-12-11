<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';

    protected $fillable = [

        'user_name',
        'password',
        'avatar',
        'full_name',
        'subscriber_email',
        'phone_number',
        'address',
        'is_open'
    ];


    public function posts()
    {
        return $this->hasMany(Post::class, 'member_id', 'id'); // member_id là khóa ngoại của posts
    }
}
