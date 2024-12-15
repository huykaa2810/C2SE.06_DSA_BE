<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'member_id' => 'required|exists:associations,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_open' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'ID danh mục là bắt buộc.',
            'category_id.exists' => 'ID danh mục không tồn tại.',

            'member_id.required' => 'ID thành viên là bắt buộc.',
            'member_id.exists' => 'ID thành viên không tồn tại.',

            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là chuỗi ký tự.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',

            'content.required' => 'Nội dung là bắt buộc.',
            'content.string' => 'Nội dung phải là chuỗi ký tự.',
            'content.min' => 'Nội dung phải có ít nhất 10 ký tự.',

            // 'image.required' => 'Hình ảnh là bắt buộc.',
            // 'image.image' => 'Trường này phải là một hình ảnh.',
            // 'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
            // 'image.max' => 'Hình ảnh không được vượt quá 2MB.',

            'is_open.required' => 'Trạng thái mở là bắt buộc.',
            'is_open.boolean' => 'Trạng thái mở phải là đúng hoặc sai.',
        ];
    }
}
