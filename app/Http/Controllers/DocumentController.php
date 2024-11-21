<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function getData()
    {
        $data   =   Document::all();

        return response()->json([
            'documents'  =>  $data
        ]);
    }
    public function store(Request $request)
    {
        $data   =   $request->all();
        Document::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới tài liệu thành công!'
        ]);
    }
    public function destroy($id)
    {
        Document::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá tài liệu thành công!'
        ]);
    }
    public function update(Request $request)
    {
        $data   = $request->all();
        Document::find($request->id)->update($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật tài liệu thành công!'
        ]);
    }
}
