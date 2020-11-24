<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'text', 'n_grams',
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Models\post', 'tag_post');
    }
}
