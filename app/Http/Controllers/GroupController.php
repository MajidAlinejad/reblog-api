<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class GroupController extends Controller
{
    public function read($id)
    {
        $group = Group::find($id);
        return view('dashboard.group.group-edit')->with('group', $group);
    }

    public function index()
    {
        $groups = Group::all();
        return view('dashboard.group.group')->with('groups', $groups);
    }

    public function all()
    {
        $group = Group::all();
        return Response::json($group);
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
        $group = new Group;
        $group->text = $request->text;
        $group->title = $request->title;
        if ($request->file('img')) {
            $spath = $request->file('img')->store('images');
            $group->img = $spath;
        }
        $group->save();
        return redirect('/groups')->with('message', 'با موفقیت اضافه شد.');
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
        $group = new Group;
        $group->text = $request->text;
        $group->title = $request->title;
        $group->img = $request->img;
        $group->save();
        // return "done";
        return $group;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        return Response::json($group);
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
        $group = Group::find($id);
        $group->text = $request->text;
        $group->title = $request->title;
        if ($request->file('img')) {
            $spath = $request->file('img')->store('images');
            $group->img = $spath;
        }
        $group->save();
        return redirect('/groups')->with('message', 'با موفقیت آپدیت شد.');
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
        $group = Group::find($id);
        $group->text = $request->text;
        $group->title = $request->title;
        $group->img = $request->img;
        $group->save();
        // return "done";
        return $group;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
    }

    public function wipe($id)
    {
        $group = Group::find($id);
        $group->delete();
        return redirect('/groups')->with('message', 'با موفقیت حذف شد.');
    }
}
