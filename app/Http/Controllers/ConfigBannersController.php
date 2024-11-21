<?php

namespace App\Http\Controllers;

use App\Models\ConfigBanners;
use Illuminate\Http\Request;

class ConfigBannersController extends Controller
{
    public function getData()
    {
        $data   =   ConfigBanners::all();

        return response()->json([
            'configbanners'  =>  $data
        ]);
    }
    public function store(Request $request)
    {
        $data   =   $request->all();
        ConfigBanners::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới thể banner thành công!'
        ]);
    }
    public function destroy($id)
    {
        ConfigBanners::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá banner thành công!'
        ]);
    }
    public function update(Request $request)
    {
        $data   = $request->all();
        ConfigBanners::find($request->id)->update($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật banner thành công!'
        ]);
    }
}