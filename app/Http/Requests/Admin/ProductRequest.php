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
        $currentMethod = $this->route()->getActionMethod(); // lấy phương thức khi submit
        $rules = [];
        switch ($this->method()){
            case 'POST':
                switch ($currentMethod){
                    case 'store':
                        $rules = [
                            'name' => 'required',
                            'image' => 'file|required',
                            'price' => 'required|integer',
                            'quantity' => 'required|integer',
                            'cate_id' => 'required',
                            'size_id' => 'required',
                            'color_id' => 'required',
                            'brand_id'  => 'required',
                        ];
                        break;
                    case 'update':
                        $rules = [
                            'name' => 'required',
                            'price' => 'required|integer',
                            'quantity' => 'required|integer',
                        ];
                        break;
                }
                break;
            default:
        }
        return $rules;
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
            'color_id' => 'Màu',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'file' => ':attribute không đúng định dạng',
            'integer' => ':attribute không phải là số'
        ];
    }




}
