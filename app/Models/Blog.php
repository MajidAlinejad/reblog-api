<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

   
    public function category()
    {
        return $this->hasOne('App\Models\Category');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
