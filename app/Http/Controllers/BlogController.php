<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class BlogController extends Controller
{
    public function all()
    {
        $blog = Blog::all();
        return Response::json($blog);
    }



    public function index()
    {
        $blog = Blog::all();
        $projects = Project::all();

        return view('dashboard.blog.blog')->with('blog', $blog)->with('projects', $projects);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            'loader' => 'required',
            'switcher' => 'required',
            'url' => 'required',
            'base' => 'required',
            'view' => 'required',
            'status' => 'required'
        ]);
        $blog = new Blog;
        $blog->status = $request->status;
        $blog->project_id = $request->project_id;
        // $blog->position = $request->position;
        $blog->position = 's';
        $blog->seo = $request->seo;
        $blog->meta = $request->meta;
        $blog->meta_desc = $request->meta_desc;
        $blog->base = $request->base;
        $blog->view = $request->view;
        $blog->icon = $request->icon;
        $blog->url = $request->url;
        // $blog->custom = $request->custom;
        // $blog->product = $request->product;
        $blog->toolbar = $request->toolbar;
        $blog->sidebar = $request->sidebar;
        $blog->loader = $request->loader;
        $blog->switcher = $request->switcher;
        $blog->save();
        // return "done";
        // return $blog;
        return redirect('/blog')->with('message', 'با موفقیت اضافه شد.');
    }

    public function read($id)
    {
        $projects = Project::all();
        $blog = Blog::find($id);
        return view('dashboard.blog.blog-edit')->with('blog', $blog)->with('projects', $projects);
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
            'project_id' => 'required',
            'loader' => 'required',
            'switcher' => 'required',
            'url' => 'required',
            'base' => 'required',
            'view' => 'required',
            'status' => 'required'
        ]);
        $blog = new Blog;
        $blog->status = $request->status;
        $blog->project_id = $request->project_id;
        // $blog->position = $request->position;
        $blog->position = 's';
        $blog->seo = $request->seo;
        $blog->meta = $request->meta;
        $blog->meta_desc = $request->meta_desc;
        $blog->base = $request->base;
        $blog->view = $request->view;
        $blog->icon = $request->icon;
        $blog->url = $request->url;
        // $blog->custom = $request->custom;
        // $blog->product = $request->product;
        $blog->toolbar = $request->toolbar;
        $blog->sidebar = $request->sidebar;
        $blog->loader = $request->loader;
        $blog->switcher = $request->switcher;
        $blog->save();
        // return "done";
        return Response::json($blog);

        // return redirect('/blog');
    }
    /**

           

       

     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $blog = Blog::where('url', $url)->first();
        return Response::json($blog);
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
            'project_id' => 'required',
            'loader' => 'required',
            'switcher' => 'required',
            'base' => 'required',
            'view' => 'required',
            'url' => 'required',
            'status' => 'required'
        ]);
        $blog = Blog::find($id);
        $blog->status = $request->status;
        $blog->project_id = $request->project_id;
        // $blog->position = $request->position;
        $blog->position = 's';
        $blog->seo = $request->seo;
        $blog->meta = $request->meta;
        $blog->meta_desc = $request->meta_desc;
        $blog->base = $request->base;
        $blog->view = $request->view;
        $blog->icon = $request->icon;
        $blog->url = $request->url;
        // $blog->custom = $request->custom;
        // $blog->product = $request->product;
        $blog->toolbar = $request->toolbar;
        $blog->sidebar = $request->sidebar;
        $blog->loader = $request->loader;
        $blog->switcher = $request->switcher;
        $blog->save();
        return redirect('/blog')->with('message', 'با موفقیت آپدیت شد.');

        // return "done";
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
            'project_id' => 'required',
            'loader' => 'required',
            'switcher' => 'required',
            'base' => 'required',
            'view' => 'required',
            'url' => 'required',
            'status' => 'required'
        ]);
        $blog = Blog::find($id);
        $blog->status = $request->status;
        $blog->project_id = $request->project_id;
        // $blog->position = $request->position;
        $blog->position = 's';
        $blog->seo = $request->seo;
        $blog->meta = $request->meta;
        $blog->meta_desc = $request->meta_desc;
        $blog->base = $request->base;
        $blog->view = $request->view;
        $blog->icon = $request->icon;
        $blog->url = $request->url;
        // $blog->custom = $request->custom;
        // $blog->product = $request->product;
        $blog->toolbar = $request->toolbar;
        $blog->sidebar = $request->sidebar;
        $blog->loader = $request->loader;
        $blog->switcher = $request->switcher;
        $blog->save();
        // return redirect('/blog');

        return Response::json($blog);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        // return redirect('/blog');

        return "done";
    }


    public function wipe($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('/blog')->with('message', 'با موفقیت حذف شد.');

        // return "done";
    }
}
