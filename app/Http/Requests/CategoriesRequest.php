<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'category_name' => 'required|string|max:255|unique:categories,name', // Tên danh mục là bắt buộc, phải là chuỗi và duy nhất trong bảng categories
            'parent_category_id' => 'nullable|exists:categories,id', // ID danh mục cha có thể để trống nhưng nếu có thì phải tồn tại trong bảng categories
            'is_open' => 'required|boolean', // Trạng thái mở là bắt buộc và phải là đúng hoặc sai
        ];
    }
    public function messages()
    {
        return [
            'category_name.required' => 'Tên danh mục là bắt buộc.',
            'category_name.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'category_name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'category_name.unique' => 'Tên danh mục đã tồn tại.',

            'parent_category_id.nullable' => 'ID danh mục cha có thể để trống.',
            'parent_category_id.exists' => 'ID danh mục cha không tồn tại.',

            'is_open.required' => 'Trạng thái mở là bắt buộc.',
            'is_open.boolean' => 'Trạng thái mở phải là đúng hoặc sai.',
        ];
    }
}
