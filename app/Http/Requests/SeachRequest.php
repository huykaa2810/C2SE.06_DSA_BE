<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeachRequest extends FormRequest
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
            'q' => 'required|string|min:1',
        ];
    }

    public function messages()
    {
        return [
            'q.required' => 'Trường tìm kiếm là bắt buộc.',
            'q.string' => 'Trường tìm kiếm phải là một chuỗi.',
            'q.min' => 'Trường tìm kiếm phải có ít nhất 1 ký tự.',
        ];
    }
}
