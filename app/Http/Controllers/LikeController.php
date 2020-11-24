<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    public function likedislike(Request $request)
    {


         $validator = Validator::make($request->all(), [
            'status' => 'required',
            // 'user_id'=>'required',
            'post_id' => 'required'
        ]);

        if (Like::where('post_id',$request->post_id)->first()) {
            $like =  Like::where('post_id',$request->post_id)->first();
        }else{
            $like = new Like;
        }

        
        $id = auth()->user()->id;

        $like->status = $request->status;
        $like->post_id = $request->post_id;
        $like->user_id = $id;
        // return "done";
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $like->save();
            return $like;
        }
    }


    public function user()
    {
        $user_id = auth()->user()->id;
        $like = Like::where('user_id', $user_id)
            ->where('status', "1")->select('post_id')->get();
        return Response::json($like);
    }


    public function post($id)
    {
        $like = Like::where('post_id', $id)
            ->where('status', "1")->get();
        return Response::json($like);
    }


    public function userunlikes($id)
    {
        $like = Like::where('user_id', $id)
            ->where('status', "0")->get();
        return Response::json($like);
    }


    public function postunlikes($id)
    {
        $like = Like::where('post_id', $id)
            ->where('status', "0")->get();
        return Response::json($like);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function likes()
    {
        $id = auth()->user()->id;
        $like = Like::where('user_id', $id)
            ->where('status', "1")->select('post_id')->pluck('post_id');
        // ->get();
        return Response::json($like);
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
            'status' => 'required',
            // 'user_id'=>'required',
            'post_id' => 'required'
        ]);

        $like = new Like;
        $id = auth()->user()->id;

        $like->status = $request->status;
        $like->post_id = $request->post_id;
        $like->user_id = $id;
        // return "done";
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $like->save();
            return $like;
        }
    }
    /**
     * Display the specified resource.
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

        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'user_id' => 'required',
            'post_id' => 'required'
        ]);

        $like =  Like::find($id);
        $like->status = $request->status;
        $like->post_id = $request->post_id;
        $like->user_id = $request->user_id;
        // return "done";
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $like->save();
            return $like;
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = auth()->user()->id;
        $like = Like::where('user_id', $user_id)
            ->where('status', "1")
            ->where('post_id', $id)
            ->delete();
    }
}
