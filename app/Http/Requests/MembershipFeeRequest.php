<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipFeeRequest extends FormRequest
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
            'fee_type'  => 'required|string|in:fixed,variable',
            'amount'    => 'required|numeric|min:0',
            'is_open'   => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'fee_type.required' => 'Loại phí là bắt buộc.',
            'fee_type.string' => 'Loại phí phải là chuỗi ký tự.',
            'fee_type.in' => 'Loại phí phải là một trong những giá trị: fixed, variable.',

            'amount.required' => 'Số tiền là bắt buộc.',
            'amount.numeric' => 'Số tiền phải là số.',
            'amount.min' => 'Số tiền phải lớn hơn hoặc bằng 0.',

            'is_open.required' => 'Trạng thái mở là bắt buộc.',
            'is_open.boolean' => 'Trạng thái mở phải là đúng hoặc sai.',
        ];
    }
}
