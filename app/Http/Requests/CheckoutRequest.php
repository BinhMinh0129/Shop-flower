<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'customer_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric|min:10',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Trường họ tên không được phép trống',
            'address.required' => 'Trường địa chỉ không được phép trống',
            'phone_number.required' => 'Trường số điện thoại không được phép trống',
            'phone_number.numeric' => 'Trường số điện thoại phải là số',
            'phone_number.min' => 'Trường số điện thoại phải lớn hơn 10',
            'email.required' => 'Trường email không được phép trống',
            'email.email' => 'Phải đúng định dạng email',
        ];
    }
}
