<?php

namespace App\Http\Controllers;

use App\Models\MembershipFeeDetails;
use Illuminate\Http\Request;

class MembershipFeeDetailsController extends Controller
{
    public function getData()
    {
        $data   =   MembershipFeeDetails::all();

        return response()->json([
            'membershipfeedetails'  =>  $data
        ]);
    }
    public function store(Request $request)
    {
        $data   =   $request->all();
        MembershipFeeDetails::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới chi tiết phí thành viên thành công!'
        ]);
    }
    public function destroy($id)
    {
        MembershipFeeDetails::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá chi tiết phí thành viên thành công!'
        ]);
    }
    public function update(Request $request)
    {
        $data   = $request->all();
        MembershipFeeDetails::find($request->id)->update($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật chi tiết phí thành viên thành công!'
        ]);
    }
}
