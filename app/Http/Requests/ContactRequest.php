<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'title' => 'required|string|max:255', // Tiêu đề là bắt buộc, phải là chuỗi và không vượt quá 255 ký tự
            'content' => 'required|string|min:10', // Nội dung là bắt buộc, phải là chuỗi và tối thiểu 10 ký tự
            'sender_name' => 'required|string|max:255', // Tên người gửi là bắt buộc, phải là chuỗi và không vượt quá 255 ký tự
            'email_sender' => 'required|email', // Email của người gửi là bắt buộc và phải có định dạng hợp lệ
            'status' => 'required|in:active,inactive,pending', // Trạng thái là bắt buộc và phải là một trong các giá trị cụ thể
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là chuỗi ký tự.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',

            'content.required' => 'Nội dung là bắt buộc.',
            'content.string' => 'Nội dung phải là chuỗi ký tự.',
            'content.min' => 'Nội dung phải có ít nhất 10 ký tự.',

            'sender_name.required' => 'Tên người gửi là bắt buộc.',
            'sender_name.string' => 'Tên người gửi phải là chuỗi ký tự.',
            'sender_name.max' => 'Tên người gửi không được vượt quá 255 ký tự.',

            'email_sender.required' => 'Email người gửi là bắt buộc.',
            'email_sender.email' => 'Email người gửi phải có định dạng hợp lệ.',

            'status.required' => 'Trạng thái là bắt buộc.',
            'status.in' => 'Trạng thái phải là một trong các giá trị: active, inactive, pending.',
        ];
    }
}
