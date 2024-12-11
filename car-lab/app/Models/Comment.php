<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'car_id',
        'content',
        'rating'
    ];

// belongs to ne edir: User modeli ile iliski,
// users table = id, name, surname ....
// comments table = id, user_id, car_id, content, rating
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
