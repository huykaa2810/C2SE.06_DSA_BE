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
            'user_name' => 'required|string',
            'password' => 'required|string',


            'full_name' => 'required|string|max:255',
            'subscriber_email' => 'required',
            'phone_number' => 'required|numeric|min:10000',
            'address' => 'required|string|max:255',
            'is_open' => 'required|boolean'

        ];
    }
    public function messages()
    {
        return [
            'user_name.required' => 'Tên người dùng là bắt buộc.',


            'password.required' => 'Mật khẩu là bắt buộc.',

            'full_name.required' => 'Tên người đăng ký là bắt buộc.',
            'full_name.string' => 'Tên người đăng ký phải là chuỗi ký tự.',
            'full_name.max' => 'Tên người đăng ký không được vượt quá 255 ký tự.',

            'subscriber_email.required' => 'Email người đăng ký là bắt buộc.',

            'phone_number.required' => 'Số điện thoại là bắt buộc.',
            'phone_number.numeric' => 'Số điện thoại phải là số.',
            'phone_number.min' => 'Số điện thoại phải có ít nhất 5 chữ số.',

            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.string' => 'Địa chỉ phải là chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',

            'is_open.required' => 'Trạng thái mở là bắt buộc.',
            'is_open.boolean' => 'Trạng thái mở phải là đúng hoặc sai.',


        ];
    }
}
