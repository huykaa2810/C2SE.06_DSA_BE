<?php

namespace App\Http\Controllers;

use App\Models\MembershipFee;
use Illuminate\Http\Request;

class MembershipFeeController extends Controller
{
    public function getData()
    {
        $data   =   MembershipFee::all();

        return response()->json([
            'membershipfees'  =>  $data
        ]);
    }
    public function store(Request $request)
    {
        $data   =   $request->all();
        MembershipFee::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới phí thành viên thành công!'
        ]);
    }
    public function destroy($id)
    {
        MembershipFee::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá phí thành viên thành công!'
        ]);
    }
    public function update(Request $request)
    {
        $data   = $request->all();
        MembershipFee::find($request->id)->update($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật phí thành viên thành công!'
        ]);
    }
}
