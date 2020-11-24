<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id)
    {
        $category = Category::find($id);
        return Response::json($category);
    }

    public function all()
    {
        $category = Category::where('category_id', 0)->with('children')->get();
       
        
        return Response::json($category);
    }

    public function blog($id)
    {
        $category = Blog::whereId($id)->first()->category()->with('children')->get();
        
        return Response::json($category);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'img'=>'required',
            // 'text'=>'required'
        ]);
        $category = new Category;
        $category->text = $request->text;
        $category->title = $request->title;
        $category->img = $request->img;
        $category->category_id = $request->category_id;
        $category->blog_id = $request->blog_id;
        $category->save();
        // return "done";
        return $category;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('category_id', $id)->get();
        return Response::json($category);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'img'=>'required',
            // 'text'=>'required'
        ]);
        $category = Category::find($id);
        $category->text = $request->text;
        $category->title = $request->title;
        $category->img = $request->img;
        $category->category_id = $request->category_id;
        $category->blog_id = $request->blog_id;
        $category->save();
        // return "done";
        return $category;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
