<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigBannersRequest;
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
    public function store(ConfigBannersRequest $request)
    {
        $data   =   $request->all();
        ConfigBanners::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới banner thành công!'
        ]);
    }

    public function getTopBanners()
    {
        // Lấy 3 banner có mức độ ưu tiên 1, 2, và 3
        $banners = ConfigBanners::where('is_open', 1)
            ->whereIn('priority', [1, 2, 3]) // Lọc theo mức độ ưu tiên
            ->orderBy('priority', 'asc') // Sắp xếp theo mức độ ưu tiên từ thấp đến cao
            ->take(3) // Lấy tối đa 3 banner
            ->get();

        return response()->json([
            'status' => true,
            'data' => $banners,
            'message' => 'Đã lấy banner thành công!'
        ]);
    }

    // public function destroy($id)
    // {
    //     ConfigBanners::find($id)->delete();

    //     return response()->json([
    //         'status'    =>  true,
    //         'message'   =>  'Đã xoá banner thành công!'
    //     ]);
    // }

        public function destroy($id)
        {
            $banner = ConfigBanners::find($id);

            if (!$banner) {
                return Response()->json(['message' => 'Banner không tồn tại!']);
            }

            $banner->delete();

            return  Response()->json(['message' => 'Xoá Banner thành công!']);
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
