<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



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
        if ($check_mail) {
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
    public function dangNhap(Request $request)
    {
        $check  = Auth::guard('member')->attempt(['user_name' => $request->user_name, 'password' =>  $request->password]);
        if ($check) {
            $user =  Auth::guard('member')->user();
            if ($user->is_block) {
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Tài khoản của bạn đã bị khoá!'
                ]);
            }
            if ($user->is_open) {
                return response()->json([
                    'status'    =>  true,
                    'token'     => $user->createToken('token')->plainTextToken,
                    'user_name'    => $user->user_name,
                    'message'   =>  'Đã đăng nhập thành công'
                ]);
            } else {
                Auth::guard('member')->logout();
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Vui lòng kiểm tra email!'
                ]);
            }
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Tài Khoản hoặc mật khẩu không đúng'
            ]);
        }
    }
}
