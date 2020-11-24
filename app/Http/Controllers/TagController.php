<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Blog;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function all()
    {
        $tags = Tag::all();
        return Response::json($tags);
    }

    public function tagss()
    {
        $tags = Tag::select('id','text')->get();
        return Response::json($tags);
    }

    public function tags($id)
    {
        $tags = [];
        $temp = Blog::whereId($id)->first()->posts()->get();
        foreach ($temp as $t ) {
            foreach ($t->tags as $tag ) {
                array_push($tags, $tag);
            }
        }
        return Response::json($tags);
    }

}
