<?php

namespace App\Http\Controllers;

use App\Models\Project;
// use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{

    public function create(Request $request)
    {
        $projects = Project::all()->count();
        if ($projects) {
            return Redirect::back()
                ->withErrors('فقط یک پروژه میتوان اضافه نمود.');
        } else {
            $request->validate([
                'status' => 'required',
                'brand' => 'required'
            ]);
            $Project = new Project;
            $Project->status = $request->status;
            $Project->brand = $request->brand;
            $Project->base = $request->base;
            $spath = $request->file('slogan')->store('images');
            $Project->slogan = $spath;

            $path = $request->file('logo')->store('images');
            $Project->logo = $path;

            $Project->save();

            // return "done";
            return redirect('/project')->with('message', 'با موفقیت اضافه شد.');
        }
    }

    public function store(Request $request)
    {
        $projects = Project::all()->count();
        if ($projects) {
            return Redirect::back()
                ->withErrors('فقط یک پروژه میتوان اضافه نمود.');
        } else {
            $request->validate([
                'status' => 'required',
                'brand' => 'required'
            ]);
            $Project = new Project;
            $Project->status = $request->status;
            $Project->brand = $request->brand;
            $Project->base = $request->base;
            $spath = $request->file('slogan')->store('images');
            $Project->slogan = $spath;

            $path = $request->file('logo')->store('images');
            $Project->logo = $path;

            $Project->save();

            // return "done";
            return $Project;
        }
    }


    public function update($id, Request $request)
    {

        $request->validate([
            'status' => 'required',
            'brand' => 'required'
        ]);
        $Project = Project::find($id);

        $Project->status = ($request->status) ? $request->status : $Project->status;
        $Project->brand = ($request->brand) ? $request->brand : $Project->brand;
        $Project->base = ($request->base) ? $request->base : $Project->base;

        if ($request->file('slogan')) {
            $spath = $request->file('slogan')->store('images');
            $Project->slogan = $spath;
            // $Project->slogan = ($request->slogan) ? $request->slogan : $Project->slogan;
        }

        if ($request->file('logo')) {
            $path = $request->file('logo')->store('images');
            $Project->logo = $path;
            // $Project->logo = ($request->logo) ? $request->logo : $Project->logo;
        }


        $Project->save();
        // return $this->index();
    }



    public function edit($id, Request $request)
    {

        $request->validate([
            'status' => 'required',
            'brand' => 'required'
        ]);
        $Project = Project::find($id);

        $Project->status = ($request->status) ? $request->status : $Project->status;
        $Project->brand = ($request->brand) ? $request->brand : $Project->brand;
        $Project->base = ($request->base) ? $request->base : $Project->base;

        if ($request->file('slogan')) {
            $spath = $request->file('slogan')->store('images');
            $Project->slogan = $spath;
            // $Project->slogan = ($request->slogan) ? $request->slogan : $Project->slogan;
        }

        if ($request->file('logo')) {
            $path = $request->file('logo')->store('images');
            $Project->logo = $path;
            // $Project->logo = ($request->logo) ? $request->logo : $Project->logo;
        }


        $Project->save();
        return redirect('/project')->with('message', 'با موفقیت آپدیت شد.');

        // return $this->index();
    }




    public function index()
    {
        $projects = Project::all();
        return view('dashboard.projects')->with('projects', $projects);
    }

    public function read($id)
    {
        $project = Project::find($id);
        return view('dashboard.project-edit')->with('project', $project);
    }
}
