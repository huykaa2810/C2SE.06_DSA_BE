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
            'url' => 'required|url', // URL là bắt buộc và phải có định dạng hợp lệ
            'is_open' => 'required|boolean', // Trạng thái mở là bắt buộc và phải là đúng hoặc sai
        ];
    }
    public function messages()
    {
        return [
            'url.required' => 'URL là bắt buộc.',
            'url.url' => 'URL phải có định dạng hợp lệ.',

            'is_open.required' => 'Trạng thái mở là bắt buộc.',
            'is_open.boolean' => 'Trạng thái mở phải là đúng hoặc sai.',
        ];
    }
}
