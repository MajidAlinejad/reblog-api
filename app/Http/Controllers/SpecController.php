<?php

namespace App\Http\Controllers;

use App\Models\Spec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class SpecController extends Controller
{
    public function index($id)
    {
        // $spec = Spec::where('post_id', $id)->with('detail')->get();


        // ->orderBy('created_at', 'ASC')
        

        // return Response::json($spec);
    }
    public function details($id)
    {
        $spec = Spec::where('cat_id', $id)->whereNotNull('spec_id')->where('filterize','1')->with('details')->get();
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
}
