<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MemberController extends Controller
{
    public function getData()
    {
        $data   =   Member::all();

        return response()->json([
            'members'  =>  $data
        ]);
    }
    public function store(MemberRequest $request)
    {
        $data   =   $request->all();
        Member::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới thành viên thành công!'
        ]);
    }
    public function destroy($id)
    {
        Member::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá thành viên thành công!'
        ]);
    }
    public function update(Request $request)
    {
        $data   = $request->all();
        Member::find($request->id)->update($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật thành viên thành công!'
        ]);
    }

    public function dangKy(Request $request)
    {
        $check_mail = Member::where('email', $request->email)->first();
        if($check_mail) {
            return response()->json([
                'status' => false,
                'message' => "Email đã tồn tại trong hệ thống!"
            ]);
        } else {
            $data                   =   $request->all();
            $data['password']       =   bcrypt($request->password);
            $data['hash_active']    =   Str::uuid();
            Member::create($data);

            $mail['ho_va_ten']      =   $request->ho_lot . " " . $request->ten;
            $mail['link']           =   "http://localhost:5173/kich-hoat/" . $data['hash_active'];
            return response()->json([
                'status' => true,
                'message' => "Đăng kí tài khoản thành công!"
            ]);
        }

    }
}
