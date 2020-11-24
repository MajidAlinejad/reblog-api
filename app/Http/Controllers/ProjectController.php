<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'brand' => 'required'
        ]);
        $Project = new Project;
        $Project->status = $request->status;
        $Project->brand = $request->brand;
        $Project->base = $request->base;
        $Project->slogan = $request->slogan;
        $Project->logo = $request->logo;

        $Project->save();
        // return "done";
        return $Project;
    }
}
