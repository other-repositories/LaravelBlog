<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'text', 'user_id', 'publish_datetime'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

   // public function comments()
   // {
   //     return $this->morphMany(Comment::class, 'commentable');
   // }

    public function scopeWithUser($query, $userId)
    {
        return $query->where('user_id', $userId)->with('user')->get();
    }


}
