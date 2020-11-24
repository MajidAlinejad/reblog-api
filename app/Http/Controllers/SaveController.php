<?php

namespace App\Http\Controllers;

use App\Models\Save;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaveController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required'
        ]);
        $id = auth()->user()->id;
        $save = new Save();
        $save->post_id = $request->post_id;
        $save->user_id = $id;
        // return "done";
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $save->save();
            return $save;
        }
    }

    public function saves()
    {
        $id = auth()->user()->id;
        $save = Save::where('user_id', $id)
            ->select('post_id')->pluck('post_id');
        return response()->json($save);
    }



    public function destroy($id)
    {
        $user_id = auth()->user()->id;
        $save = Save::where('user_id', $user_id)
            ->where('post_id', $id)
            ->delete();
    }
}
