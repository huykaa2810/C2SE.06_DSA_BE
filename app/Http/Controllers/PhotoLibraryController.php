<?php

namespace App\Http\Controllers;

use App\Models\PhotoLibrary;
use Illuminate\Http\Request;

class PhotoLibraryController extends Controller
{
    public function getData()
    {
        $data   =   PhotoLibrary::all();

        return response()->json([
            'photo_librarys'  =>  $data
        ]);
    }
    public function store(Request $request)
    {
        $data   =   $request->all();
        PhotoLibrary::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới thư viện ảnh thành công!'
        ]);
    }
    public function destroy($id)
    {
        PhotoLibrary::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá thư viện ảnh thành công!'
        ]);
    }
    public function update(Request $request)
    {
        $data   = $request->all();
        PhotoLibrary::find($request->id)->update($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật thư viện ảnh thành công!'
        ]);
    }
}
