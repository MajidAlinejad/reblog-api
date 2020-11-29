<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function cats()
    {
        $blog = Blog::all();
        $category = Category::where('category_id', 0)->with('children')->get();
        $all = Category::all();
        return view('dashboard.category.categories')
            ->with('category', $category)
            ->with('blog', $blog)
            ->with('all', $all);
    }



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


    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'img'=>'required',
            // 'text'=>'required'
        ]);
        $category = new Category;
        $category->text = $request->text;
        $category->title = $request->title;
        if ($request->file('img')) {
            $path = $request->file('img')->store('images');
            $category->img = $path;
        } else {
            $category->img = "";
        }
        $category->category_id = $request->category_id;
        $category->blog_id = $request->blog_id;
        $category->save();
        // return "done";
        // return $category;
        return redirect('/category')->with('message', 'با موفقیت اضافه شد.');
    }


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
    public function edit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'img'=>'required',
            // 'text'=>'required'
        ]);
        $category = Category::find($id);
        $category->text = $request->text;
        $category->title = $request->title;
        if ($request->file('img')) {
            $path = $request->file('img')->store('images');
            $category->img = $path;
        } else {
            $category->img = "";
        }
        $category->category_id = $request->category_id;
        $category->blog_id = $request->blog_id;
        $category->save();
        // return "done";
        // return $category;
        return redirect('/category')->with('message', 'با موفقیت ویرایش شد.');
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
        return "done";
        // 
    }


    public function wipe($id)
    {
        $category = Category::where('id', $id)->with('children')->first();
        if ($category->children->count()) {
            return redirect('/category')->withErrors('برای حذف ابتدا زیر مجموعه ها را حذف کنید.');
        } else {
            $category->delete();
            return redirect('/category')->with('message', 'با موفقیت حذف شد.');
        }
    }
}
