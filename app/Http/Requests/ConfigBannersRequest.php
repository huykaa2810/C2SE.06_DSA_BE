<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigBannersRequest extends FormRequest
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
            'image' => 'required',
            'priority' => 'required',
            'is_open' => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'bắt buộc nhập ảnh.',
            // 'url.url' => 'URL phải có định dạng hợp lệ.',
            'priority.required' => 'Phải nhập số.',

            'is_open.required' => 'Trạng thái mở là bắt buộc.',
            'is_open.boolean' => 'Trạng thái mở phải là đúng hoặc sai.',
        ];
    }
}
