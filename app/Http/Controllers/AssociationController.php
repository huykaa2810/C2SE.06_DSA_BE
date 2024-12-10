<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssociationRequest;
use App\Models\Association;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    // $data   =   Member::all();

    //     return response()->json([
    //         'members'  =>  $data
    //     ]);
    // }
    public function getData()
    {
        $data   =   Association::all();

        return response()->json([
            'members'  =>  $data
        ]);
    }
    public function store(AssociationRequest $request)
    {
        $data   =   $request->all();
        Association::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới thành viên thành công!'
        ]);
    }
    public function destroy($id)
    {
        Association::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá thành viên thành công!'
        ]);
    }
    public function update(Request $request)
    {
        $data   = $request->all();
        Association::find($request->id)->update($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật thành viên thành công!'
        ]);
    }
    public function dangNhap(Request $request)
    {
        $check  = Auth::guard('association')->attempt(['email' => $request->email, 'password' =>  $request->password]);

        if ($check) {
            $user =  Auth::guard('association')->user();
            return response()->json([
                'status'        =>  true,
                'token'         => $user->createToken('token')->plainTextToken,
                'ho_ten_admin'  => $user->ho_va_ten,
                'avatar_admin'  => $user->avatar,
                'message'       =>  'Đã đăng nhập thành công'
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Tài Khoản hoặc mật khẩu không đúng'
            ]);
        }
    }
}
