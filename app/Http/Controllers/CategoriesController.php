<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getData()
    {
        $data   =   Categories::all();

        return response()->json([
            'categories'  =>  $data
        ]);
    }
    public function store(CategoriesRequest $request)
    {
        $data   =   $request->all();
        Categories::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới thể loại thành công!'
        ]);
    }
    public function destroy($id)
    {
        Categories::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá thể loại thành công!'
        ]);
    }
    public function update(Request $request)
    {
        $data   = $request->all();
        Categories::find($request->id)->update($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật thể loại thành công!'
        ]);
    }
}
