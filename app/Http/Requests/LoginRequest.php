<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:32'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Trường Email không được phép trống',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email không tồn tại',
            'password.required' => 'Trường password không được phép trống',
            'password.min' => 'Password không được nhỏ hơn 6 kí tự',
            'password.max' => 'Password không được lớn hơn 32 kí tự',
        ];
    }
}
