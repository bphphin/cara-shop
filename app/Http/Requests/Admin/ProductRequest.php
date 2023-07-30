<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'image' => 'file|required',
            'price' => 'required|integer|max:10',
            'quantity' => 'required|integer|min:1',
            'cate_id' => 'required',
            'size_id' => 'required',
            'color_id' => 'required',
            'brand_id'  => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'image' => 'Ảnh',
            'price' => 'Giá',
            'quantity' => 'Số lượng',
            'cate_id' => 'Danh mục',
            'brand_id' => 'Thương hiệu',
            'size_id' => 'Size',
            'color_id' => 'Màu'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'file' => ':attribute không đúng định dạng',
            'min' => ':attribute không quá :min ký tự',
            'max' => ':attribute không được quá :max ký tự',
            'integer' => ':attribute không phải là số'
        ];
    }




}
