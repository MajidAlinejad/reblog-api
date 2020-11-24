<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category')->with('children');
    }

    public function brands()
    {
        return $this->belongsToMany('App\Models\Brand','brand_category');
    }

    public function specs()
    {
        return $this->hasMany('App\Models\Spec');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function blog()
    {
        return $this->hasMany('App\Models\Blog');
    }

    public function grandparent()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id')->with('grandparent');
    }
}
