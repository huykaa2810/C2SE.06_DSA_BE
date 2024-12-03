<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'url_file' => 'required|url',
            'member_id' => 'required|exists:members,id', 
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là chuỗi ký tự.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',

            'url_file.required' => 'URL tệp là bắt buộc.',
            'url_file.url' => 'URL tệp phải có định dạng hợp lệ.',

            'member_id.required' => 'ID thành viên là bắt buộc.',
            'member_id.exists' => 'ID thành viên không tồn tại.',
        ];
    }
}
