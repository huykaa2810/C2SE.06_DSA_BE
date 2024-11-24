<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoLibraryRequest extends FormRequest
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
            'url' => 'required|url', // Kiểm tra xem trường có phải là một URL hợp lệ không
            'title' => 'required|string|max:255', // Tên là bắt buộc, phải là chuỗi và không vượt quá 255 ký tự
            'is_open' => 'required|boolean', // Trạng thái mở là bắt buộc và phải là true hoặc false
        ];
    }
    public function messages()
    {
        return [
            'url.required' => 'URL là bắt buộc.',
            'url.url' => 'URL phải có định dạng hợp lệ.',

            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là chuỗi ký tự.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',

            'is_open.required' => 'Trạng thái mở là bắt buộc.',
            'is_open.boolean' => 'Trạng thái mở phải là true hoặc false.',
        ];
    }
}
