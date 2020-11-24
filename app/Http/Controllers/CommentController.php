<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index()
    {
    }

    public function all($id)
    {
        $per_page = \Request::get('per_page') ?: 100;
        $comment = Comment::where('post_id', $id)
            ->where('comment_id', "0")
            ->with('subComment')
            ->with('user')
            ->orderBy('created_at', 'ASC')->paginate($per_page);
        foreach ($comment as $key => $cm) {
            foreach ($cm->subComment as $key => $sub) {
                $sub->user;
            }
        }
        // $comment[0]->subComment[0]->user ;
        return Response::json($comment);
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
            'text' => 'required',
            // 'like'=>'required',
            // 'unlike'=>'required',
            // 'comment_id'=>'required',
            // 'user_id'=>'required',
            'post_id' => 'required'
        ]);

        $comment = new Comment;
        $comment->text = $request->text;
        $comment->like = "0";
        $comment->unlike = "0";
        if ($request->comment_id) {
            $comment->comment_id = $request->comment_id;
        } else {
            $comment->comment_id = "0";
        }
        $comment->post_id = $request->post_id;
        $id = auth()->user()->id;
        $comment->user_id = $id;
        // return "done";
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $comment->save();
            return $comment;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return Response::json($comment->comments);
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

        $validator = Validator::make($request->all(), [
            'text' => 'required',
            // 'like'=>'required',
            // 'unlike'=>'required',
            // 'comment_id'=>'required',
            // 'user_id'=>'required',
            // 'post_id'=>'required'
        ]);

        $comment = Comment::find($id);
        $comment->text = $request->text;
        // $comment->like = $request->like;
        // $comment->unlike = $request->unlike;
        // $comment->comment_id = $request->comment_id;
        // $comment->post_id = $request->post_id;
        $id = auth()->user()->id;
        $comment->user_id = $id;

        // return "done";
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $comment->save();
            return $comment;
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
        $comment = Comment::find($id);
        $comment->delete();
    }
}
