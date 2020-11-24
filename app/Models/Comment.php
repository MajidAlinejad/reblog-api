<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function subComment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function comment()
    {
        return $this->belongsTo('App\Models\Comment');
    }
}
