<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssociationRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateAssociationRequest;
use App\Models\Association;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AssociationController extends Controller
{
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
            'message'   =>  'Đã tạo mới hội viên thành công!'
        ]);
    }
    public function destroy($id)
    {
        Association::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá hội viên thành công!'
        ]);
    }

    public function updateAssociation(UpdateAssociationRequest $request, $id)
    {
        $association = Association::findOrFail($id);
        $association->user_name = $request->user_name;
        if ($request->filled('password')) {
            $association->password = bcrypt($request->password);
        }
        $association->company_email = $request->company_email;
        $association->registrant_name = $request->registrant_name;
        $association->subscriber_email = $request->subscriber_email;
        $association->registered_phone_number = $request->registered_phone_number;
        $association->address = $request->address;
        $association->website = $request->website;
        $association->avatar = $request->avatar;
        $association->is_active = $request->is_active;
        $association->is_open = $request->is_open;
        $association->company_name = $request->company_name;
        $association->is_master = $request->is_master;
        $association->save();
        return response()->json(['message' => 'Cập nhật hiệp hội thành công', 'association' => $association]);
    }

    public function update(Request $request)
    {
        $data   = $request->all();
        Association::find($request->id)->update($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật hội viên thành công!'
        ]);
    }


    public function dangNhap(Request $request)
    {
        $check  = Auth::guard('association')->attempt(['user_name' => $request->user_name, 'password' =>  $request->password]);

        if ($check) {
            $user =  Auth::guard('association')->user();
            return response()->json([
                'status'        =>  true,
                'token'         => $user->createToken('token')->plainTextToken,
                'user_name'  => $user->user_name,
                'avatar_user'  => $user->avatar,
                'message'       =>  'Đã đăng nhập thành công'
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Tài Khoản hoặc mật khẩu không đúng'
            ]);
        }
    }
    public function kiemTraToken(Request $request)
    {
        if ($request->user()) {
            return response()->json([
                'status' => true,
                'user' => $request->user(),
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Token không hợp lệ',
            ]);
        }
    }

    public function getAllAvatars()
    {
        $avatars = Association::select('id', 'avatar')->get();

        return response()->json($avatars);
    }


    public function search(Request $request)
    {
        $query = $request->input('q');
        $results = Association::where('company_name', 'LIKE', "%{$query}%")
            ->select('id', 'company_name', 'avatar')
            ->take(3)
            ->get();
        return response()->json($results, 200);
    }

    public function getAssociationById($id)
    {
        $association = Association::find($id);

        if (!$association) {
            return response()->json(['message' => 'Association không tồn tại']);
        }
        $associationData = $association->makeHidden(['password']);
        return response()->json($associationData);
    }


    public function getTotalAssociations()
    {
        $totalAssociations = Association::count();
        return response()->json([
            'status' => true,
            'total_associations' => $totalAssociations,
            'message' => 'Tổng số lượng hiệp hội'
        ]);
    }


    public function changePassword(ChangePasswordRequest $request, $id)
    {
        $Association = Association::findOrFail($id);

        Log::debug('Current Password (input): ' . $request->current_password);
        Log::debug('Stored Password: ' . $Association->password);

        if (!Hash::check($request->current_password, $Association->password)) {
            return response()->json(['message' => 'Mật khẩu hiện tại không đúng.']);
        }

        if (Hash::check($request->new_password, $Association->password)) {
            return response()->json(['message' => 'Mật khẩu mới không được giống mật khẩu hiện tại.']);
        }

        $Association->password = Hash::make($request->new_password);
        $Association->save();

        return response()->json(['message' => 'Đổi mật khẩu thành công.']);
    }
}
