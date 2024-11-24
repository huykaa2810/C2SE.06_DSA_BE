<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventsRequest extends FormRequest
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
            'title'         => 'required|min:5',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content'       => 'required|min:10',
            'event_date'    => 'required|date|after_or_equal:today',
            'location'      => 'required|min:5',
            'end_date'      => 'required|date|after:event_date',
            'organizer_id'  => 'required',
            'status'        => 'required|in:active,inactive,pending',
        ];
    }
    public function messages()
    {
        return [
            'title'         => 'title phải từ 5 ký tự.',
            'image'         => 'image phải là dạng tệp cho hình ảnh và giới hạn kích thước tệp tối đa là 2MB.',
            'content'       => 'content có ít nhất 10 ký tự.',
            'event_date'    => 'event_date phải đảm bảo rằng ngày sự kiện không được trước ngày hôm nay',
            'location'      => 'location phải từ 5 ký tự.',
            'end_date'      => 'ngày của end_date phải sau event_date',
            'organizer_id'  => 'organizer_id không được bỏ trống.',
            'status'        => 'chỉ nhập các trạng thái sau nactive,inactive,pending',
        ];
    }
}
