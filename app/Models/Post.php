<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    public $asYouType = true;

    public function toSearchableArray()
    {
        $data = array(
            'id' => $this->id,
            'meta' => $this->meta,
            'title' => $this->title,
            'caption' => $this->caption,
        );

        return $data;
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function postDetails()
    {
        // return $this->hasMany('App\Models\Detail');
        return $this->hasMany('App\Models\Detail','detail_post');
    }

    public function details()
    {
        // return $this->hasMany('App\Models\Detail');
        return $this->belongsToMany('App\Models\Detail','detail_post');
    }

    public function blocks()
    {
        return $this->hasMany('App\Models\Block');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    // public function relatedCategory()
    // {
    //     return $this->hasOne('App\Models\Category');
    // }



    // -----------------

    public function blog()
    {
        return $this->belongsTo('App\Models\Blog');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'tag_post');
    }
}
