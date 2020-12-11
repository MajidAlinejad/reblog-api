<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Spec;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class DetailController extends Controller
{
    public function index($id)
    {
        // $post = Post::find($id)->details()->get();
        $post = Detail::whereHas('posts', function ($query) use ($id) {
            $query->where('post_id', $id);
        })->get();
        return Response::json($post);
    }


    public function all($id)
    {
        // $post = Post::find($id);
        $spec = Spec::find($id);
        return view('dashboard.detail.index')
            // ->with('post', $post)
            ->with('spec', $spec);
    }

    public function spec($id, $cat)
    {

        $spec = Spec::where('cat_id', $cat)
            ->where('spec_id', null)
            ->with(['detSpec' => function ($query) use ($id, $cat) {
                $query->where('cat_id', $cat)->with(['details' => function ($query) use ($id) {
                    $query->whereHas('posts', function ($query) use ($id) {
                        $query->where('post_id', $id);
                    });
                }]);
            }])->get();
        return Response::json($spec);
    }

    public function post($id)
    {
        $detail = Detail::where('post_id', $id)->with('spec')->get();
        return Response::json($detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function specs($id)
    {
        $spec = Spec::where('spec_id', null)
            ->with(['detSpec' => function ($query) use ($id) {
                $query->with(['details' => function ($query) use ($id) {
                    $query->where('post_id', $id);
                }]);
            }])->get();
        return Response::json($spec);
    }


    public function create(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'value' => 'required',
            // 'desc' => 'required',
            // 'post_id' => 'required',
            'spec_id' => 'required',
        ]);

        $detail = new Detail;
        $detail->value = $request->value;
        $detail->text = $request->text;
        $detail->special = $request->special;
        $detail->spec_id = $request->spec_id;
        // return "done";

        if ($validator->fails()) {
            // return response()->json($validator->errors(), 422);
            return back()->withErrors($validator->errors());
        } else {
            $detail->save();
            $detail->posts()->attach($request->post_id);
            return back()->with('message', 'با موفقیت اضافه شد.');
            // return Response::json($detail);
        }
        // return $detail;
    }



    public function edit(Request $request, $id)
    {


        $validator = Validator::make($request->all(), [
            'value' => 'required',
            // 'desc' => 'required',
            // 'post_id' => 'required',
            // 'spec_id' => 'required',
        ]);

        $detail = Detail::find($id);
        $detail->value = $request->value;
        $detail->text = $request->text;
        $detail->special = $request->special;
        // $detail->spec_id = $request->spec_id;
        // return "done";

        if ($validator->fails()) {
            // return response()->json($validator->errors(), 422);
            return back()->withErrors($validator->errors());
        } else {
            $detail->save();
            $detail->posts()->attach($request->post_id);
            return back()->with('message', 'با موفقیت اضافه شد.');
            // return Response::json($detail);
        }
        // return $detail;
    }



    public function store(Request $request)
    {

        if ($request->id) {

            $validator = Validator::make($request->all(), [
                'post_id' => 'required',
            ]);
            $detail = Detail::find($request->id);
            $detail->posts()->attach($request->post_id);
        } else {

            $validator = Validator::make($request->all(), [
                'value' => 'required',
                // 'desc' => 'required',
                // 'post_id' => 'required',
                'spec_id' => 'required',
            ]);




            $detail = new Detail;
            $detail->value = $request->value;
            $detail->text = $request->text;
            $detail->special = $request->special;
            $detail->spec_id = $request->spec_id;
            // return "done";

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            } else {
                $detail->save();
                $detail->posts()->attach($request->post_id);

                return Response::json($detail);
            }
            return $detail;
        }
    }

    public function connect($id, Request $request)
    {
        $post = Post::find($id);
        $connect = $request->input('det');
        $post->details()->sync($connect);
        return redirect('/view/' . $id)->with('message', 'با موفقیت مرتبط شد.');
    }
    /**
     * Display the detailified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Detail::find($id);
        return Response::json($detail);
    }
    /**
     * Show the form for editing the detailified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the detailified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required',
            // 'desc' => 'required',
            // 'post_id' => 'required',
            'spec_id' => 'required',
        ]);




        $detail = Detail::find($id);
        $detail->value = $request->value;
        $detail->spec_id = $request->spec_id;

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $detail->save();
            return Response::json($detail);
        }
        return $detail;
    }
    /**
     * Remove the detailified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = Detail::find($id);
        $detail->delete();
    }
}
