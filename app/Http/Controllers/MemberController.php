<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\RegisterMemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'user_name' => 'required|string|max:255',
    //         'password' => 'nullable|string|min:8',
    //         'avatar' => 'nullable|string',
    //         'full_name' => 'required|string|max:255',
    //         'subscriber_email' => 'nullable|email|max:255',
    //         'phone_number' => 'nullable|string|max:20',
    //         'address' => 'nullable|string|max:255',
    //         'is_open' => 'required|boolean',
    //     ]);
    //     $member = Member::find($id);

    //     if (!$member) {
    //         return response()->json(['message' => 'Member không tồn tại']);
    //     }
    //     $member->user_name = $request->user_name;
    //     if ($request->password) {
    //         $member->password = bcrypt($request->password);
    //     }
    //     $member->avatar = $request->avatar;
    //     $member->full_name = $request->full_name;
    //     $member->subscriber_email = $request->subscriber_email;
    //     $member->phone_number = $request->phone_number;
    //     $member->address = $request->address;
    //     $member->is_open = $request->is_open;
    //     $member->save();
    //     return response()->json(['message' => 'Member cập nhật thành công', 'member' => $member]);
    // }


    public function dangKy(RegisterMemberRequest $request)
    {
        $check_mail = Member::where('user_name', $request->user_name)->first();
        if ($check_mail) {
            return response()->json([
                'status' => false,
                'message' => "Email đã tồn tại trong hệ thống!"
            ]);
        } else {
            $data                   =   $request->all();
            $data['password']       =   bcrypt($request->password);
            Member::create($data);
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

    public function kiemTraToken(Request $request)
    {
        $user = $request->user();

        if ($user) {
            return response()->json([
                'status' => true,
                'message' => 'Token hợp lệ',
                'user' => $user
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Token không hợp lệ hoặc đã hết hạn'
        ]);
    }

    public function updateCurrentUser(Request $request)
    {
        $user = Auth::guard('member')->user();

        if ($user->id != $request->id) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền cập nhật thông tin của người khác!'
            ], 403);
        }

        $data = $request->only(['subscriber_email', 'full_name', 'avatar', 'address']);

        $user->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Thông tin của bạn đã được cập nhật thành công!'
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $member = Auth::member();
        if (!Hash::check($request->current_password, $member->password)) {
            return response()->json(['message' => 'Mật khẩu hiện tại không đúng.']);
        }
        $member->password = Hash::make($request->new_password);
        $member->save();

        return response()->json(['message' => 'Đổi mật khẩu thành công.']);
    }
}
