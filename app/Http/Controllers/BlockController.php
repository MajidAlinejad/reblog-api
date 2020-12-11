<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BlockController extends Controller
{
    public function index()
    {
    }

    public function all($id)
    {
        $block = Block::where('post_id', $id)
            ->orderBy('order')
            ->get();
        return Response::json($block);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'order' => 'required',
            'post_id' => 'required',
            // 'img'=>'required',
            // 'text'=>'required'
        ]);
        $block = new Block;
        $block->order = $request->order;
        // $block->stream = $request->stream;
        $block->title = $request->title;
        // $block->special = $request->special;
        $block->post_id = $request->post_id;
        $block->text = $request->text;
        if ($request->file('stream')) {
            $spath = $request->file('stream')->store('stream');
            $block->stream = $spath;
        }
        if ($request->file('special')) {
            $spath = $request->file('special')->store('images');
            $block->special = $spath;
        }
        if ($request->file('img')) {
            $spath = $request->file('img')->store('images');
            $block->img = $spath;
        }
        $block->save();
        // return "done";
        // return $block;
        return back()->with('message', 'با موفقیت افزوده شد.');
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
            'order' => 'required',
            'post_id' => 'required',
            // 'img'=>'required',
            // 'text'=>'required'
        ]);
        $block = new Block;
        $block->order = $request->order;
        $block->stream = $request->stream;
        $block->title = $request->title;
        $block->special = $request->special;
        $block->post_id = $request->post_id;
        $block->text = $request->text;
        $block->img = $request->img;
        $block->save();
        // return "done";
        return $block;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $block = Block::find($id);
        return Response::json($block);
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
            'order' => 'required',
            // 'post_id' => 'required',
            // 'img'=>'required',
            // 'text'=>'required'
        ]);
        $block = Block::find($id);
        $block->order = $request->order;
        // $block->stream = $request->stream;
        $block->title = $request->title;
        // $block->special = $request->special;
        // $block->post_id = $request->post_id;
        $block->text = $request->text;
        if ($request->file('stream')) {
            $spath = $request->file('stream')->store('stream');
            $block->stream = $spath;
        }
        if ($request->file('special')) {
            $spath = $request->file('special')->store('images');
            $block->special = $spath;
        }
        if ($request->file('img')) {
            $spath = $request->file('img')->store('images');
            $block->img = $spath;
        }
        $block->save();
        // return "done";
        // return $block;
        return back()->with('message', 'با موفقیت ویرایش شد.');
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
            'order' => 'required',
            'post_id' => 'required',
            // 'img'=>'required',
            // 'text'=>'required'
        ]);
        $block = Block::find($id);
        $block->order = $request->order;
        $block->title = $request->title;
        if ($request->alt_stream) {
            $block->stream = $request->alt_stream;
        } else if ($request->file('stream')) {
            $spath = $request->file('stream')->store('stream');
            $block->stream = $spath;
        }
        $block->special = $request->special;
        $block->post_id = $request->post_id;
        $block->text = $request->text;
        $block->img = $request->img;
        $block->save();
        // return "done";
        return $block;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = Block::find($id);
        $block->delete();
    }

    public function wipe($id)
    {
        $block = Block::find($id);
        $block->delete();
        return back()->with('message', 'با موفقیت حذف شد.');

        // return "done";
    }
}
