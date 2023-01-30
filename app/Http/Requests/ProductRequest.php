<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'img' => 'image',
            'description' => 'required',
            'content' => 'required',
            'price' => 'required|integer|min:10000',
            'price_sale' => 'required|integer|min:10000|lt:price',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường tên sản phẩm không được phép trống',
            'img.image' => 'File phải là ảnh',
            'description.required' => 'Trường mô tả không được phép trống',
            'content.required' => 'Trường mô tả không được phép trống',
            'price.required' => 'Trường giá sản phẩm không được phép trống',
            'price.min' => 'Giá sản phẩm không được dưới 10000',
            'price_sale.required' => 'Trường giá bán sản phẩm không được phép trống',
            'price_sale.min' => 'Giá bán sản phẩm không được dưới 10000',
            'price_sale.lt' => 'Giá bán phải nhỏ hơn giá sản phẩm'
        ];
    }
}
