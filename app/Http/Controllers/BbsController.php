<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class BbsController extends Controller
{
    public function index()
    {
        $bbs_data = Message::where('is_delete', 0)->orderBy('id', 'desc')->get();
        // dd($bbs_data);
        return view('bbs', compact('bbs_data'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|max:10',
            'message' => 'required|max:30',
        ]);
        $name = $request->name;
        $message = $request->message;

        $data = [
            'name' => $name,
            'message' => $message,
        ];
        //Messageモデルでmessagesテーブルにインサート
        Message::insert($data);
        return redirect('/');
    }

    public function delete($id)
    {
        Message::where('id', $id)->update([
            'is_delete' => 1,
            'updated_at' => now()
        ]);
        return redirect('/');
    }
}
