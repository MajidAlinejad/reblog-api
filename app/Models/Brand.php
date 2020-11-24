<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name', 'fa_name', 'img', 'n_grams',
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','brand_category');
    }


    //  ----------------------------------------


}
