<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function details()
    {
        return $this->hasMany('App\Models\Detail');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


    public function spec()
    {
        return $this->belongsTo('App\Models\Spec');
    }

    public function specs()
    {
        return $this->hasMany('App\Models\Spec')->with('details');
    }


    public function detSpec()
    {
         return $this->hasMany('App\Models\Spec');
    }


}
