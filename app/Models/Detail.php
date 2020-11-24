<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function spec()
    {
        return $this->belongsTo('App\Models\Spec')->with('spec');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post','detail_post');
    }
}
