<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'lastname', 'email',  'age'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }
}
