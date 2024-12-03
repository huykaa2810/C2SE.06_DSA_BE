<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipFeeDetailsRequest extends FormRequest
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
            'amount_id' => 'required|exists:amounts,id',
            'member_id' => 'required|exists:members,id',
            'status' => 'required|in:active,inactive,pending',
            'amount' => 'required|numeric|min:0',

        ];
    }
    public function messages()
    {
        return [
            'amount_id.required' => 'ID số tiền là bắt buộc.',
            'amount_id.exists' => 'ID số tiền không tồn tại.',

            'member_id.required' => 'ID thành viên là bắt buộc.',
            'member_id.exists' => 'ID thành viên không tồn tại.',

            'status.required' => 'Trạng thái là bắt buộc.',
            'status.in' => 'Trạng thái phải là một trong các giá trị: active, inactive, pending.',

            'amount.required' => 'Số tiền là bắt buộc.',
            'amount.numeric' => 'Số tiền phải là số.',
            'amount.min' => 'Số tiền phải lớn hơn hoặc bằng 0.',
        ];
    }
}
