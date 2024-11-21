<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function getData()
    {
        $data   =   Events::all();

        return response()->json([
            'events'  =>  $data
        ]);
    }
    public function store(Request $request)
    {
        $data   =   $request->all();
        Events::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới sự kiện thành công!'
        ]);
    }
    public function destroy($id)
    {
        Events::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá sự kiện thành công!'
        ]);
    }
    public function update(Request $request)
    {
        $data   = $request->all();
        Events::find($request->id)->update($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật sự kiện thành công!'
        ]);
    }
}
