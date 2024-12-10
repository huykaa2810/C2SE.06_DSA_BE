<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'user_name' => 'required|string|alpha_num|unique:users,user_name|max:255',
            'password' => 'required|string|min:8|regex:/[0-9]/',


            'full_name' => 'required|string|max:255',
            'subscriber_email' => 'required|email|unique:subscribers,email',
            'phone_number' => 'required|numeric|min:10000',
            'address' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'is_open' => 'required|boolean',
            'is_member' => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'user_name.required' => 'Tên người dùng là bắt buộc.',
            'user_name.string' => 'Tên người dùng phải là chuỗi ký tự.',
            'user_name.alpha_num' => 'Tên người dùng chỉ được chứa chữ cái và số.',
            'user_name.unique' => 'Tên người dùng đã tồn tại.',
            'user_name.max' => 'Tên người dùng không được vượt quá 255 ký tự.',

            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một số.',

            'full_name.required' => 'Tên người đăng ký là bắt buộc.',
            'full_name.string' => 'Tên người đăng ký phải là chuỗi ký tự.',
            'full_name.max' => 'Tên người đăng ký không được vượt quá 255 ký tự.',

            'subscriber_email.required' => 'Email người đăng ký là bắt buộc.',
            'subscriber_email.email' => 'Email người đăng ký phải có định dạng hợp lệ.',
            'subscriber_email.unique' => 'Email người đăng ký đã tồn tại.',

            'phone_number.required' => 'Số điện thoại là bắt buộc.',
            'phone_number.numeric' => 'Số điện thoại phải là số.',
            'phone_number.min' => 'Số điện thoại phải có ít nhất 5 chữ số.',

            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.string' => 'Địa chỉ phải là chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',

            'is_active.required' => 'Trạng thái hoạt động là bắt buộc.',
            'is_active.boolean' => 'Trạng thái hoạt động phải là đúng hoặc sai.',

            'is_open.required' => 'Trạng thái mở là bắt buộc.',
            'is_open.boolean' => 'Trạng thái mở phải là đúng hoặc sai.',

            'is_member.required' => 'Trạng thái thành viên là bắt buộc.',
            'is_member.boolean' => 'Trạng thái thành viên phải là đúng hoặc sai.',
        ];
    }
}
