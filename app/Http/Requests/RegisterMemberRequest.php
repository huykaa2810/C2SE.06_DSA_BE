<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'user_name' => 'required|string|unique:members',
            'password' => 'required|string|min:8|confirmed',
            'full_name' => 'required|string',
            'subscriber_email' => 'nullable|email',
            'phone_number' => 'nullable|numberic',
            'address' => 'nullable|string',
            'avatar' => 'nullable|string',
            'is_open' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Tên đăng nhập là bắt buộc.',
            'user_name.unique' => 'Tên đăng nhập đã tồn tại.',
            'user_name.string' => 'Tên đăng nhập phải là một chuỗi.',


            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.string' => 'Mật khẩu phải là một chuỗi.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',

            'full_name.required' => 'Họ tên là bắt buộc.',
            'full_name.string' => 'Họ tên phải là một chuỗi.',

            'subscriber_email.email' => 'Email không hợp lệ.',

            'phone_number.numberic' => 'Số điện thoại phải là số.',

            'address.string' => 'Địa chỉ phải là một chuỗi.',

            'avatar.string' => 'Avatar phải là một chuỗi.',

            'is_open.boolean' => 'Trạng thái mở phải là đúng hoặc sai.',
        ];
    }
}
