<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Spec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class SpecController extends Controller
{
    public function index($id)
    {
        $category = Category::find($id);
        $spec = Spec::where('cat_id', $id)->get();
        $specs = Spec::where('cat_id', $id)->get();
        return view('dashboard.spec.index')->with('spec', $spec)->with('specs', $specs)->with('category', $category);
    }
    public function details($id)
    {
        $spec = Spec::where('cat_id', $id)->whereNotNull('spec_id')->where('filterize', '1')->with('details')->get();
        return Response::json($spec);
    }

    public function cat($id)
    {
        $spec = Spec::where('cat_id', $id)->get();
        return Response::json($spec);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            // 'desc' => 'required',
            'filterize' => 'required',
            'cat_id' => 'required',
            // 'spec_id' => 'required',
        ]);



        $spec = new Spec;
        $spec->name = $request->name;
        $spec->desc = $request->desc;
        $spec->filterize = $request->filterize;
        $spec->cat_id = $request->cat_id;
        $spec->spec_id = $request->spec_id;

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $spec->save();
            return redirect('/specs/' . $spec->cat_id)->with('message', 'با موفقیت اضافه شد.');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            // 'desc' => 'required',
            'filterize' => 'required',
            'cat_id' => 'required',
            // 'spec_id' => 'required',
        ]);




        $spec = new Spec;
        $spec->name = $request->name;
        $spec->desc = $request->desc;
        $spec->filterize = $request->filterize;
        $spec->cat_id = $request->cat_id;
        $spec->spec_id = $request->spec_id;
        // return "done";

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $spec->save();
            return Response::json($spec);
        }
        return $spec;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spec = Spec::find($id);
        return Response::json($spec);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            // 'desc' => 'required',
            'filterize' => 'required',
            'cat_id' => 'required',
            // 'spec_id' => 'required',
        ]);



        $spec = Spec::find($id);
        $spec->name = $request->name;
        $spec->desc = $request->desc;
        $spec->filterize = $request->filterize;
        $spec->cat_id = $request->cat_id;
        $spec->spec_id = $request->spec_id;

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $spec->save();
            return back()->with('message', 'با موفقیت اضافه شد.');
        }
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
            'name' => 'required',
            'filterize' => 'required',
            'cat_id' => 'required',
            'spec_id' => 'required',
        ]);
        $spec = Spec::find($id);

        $spec->name = $request->name;
        $spec->desc = $request->desc;
        $spec->filterize = $request->filterize;
        $spec->cat_id = $request->cat_id;
        $spec->spec_id = $request->spec_id;
        $spec->save();
        // return "done";
        return $spec;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spec = Spec::find($id);
        $spec->delete();
    }


    public function wipe($id)
    {
        $spec = Spec::find($id);
        $spec->delete();
        return back()->with('message', 'با موفقیت حذف شد.');
    }
}
