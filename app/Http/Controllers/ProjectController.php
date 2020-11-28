<?php

namespace App\Http\Controllers;

use App\Models\Project;
// use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
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



    public function index()
    {
        $projects = Project::all();
        return view('dashboard.projects')->with('projects', $projects);
    }
}
