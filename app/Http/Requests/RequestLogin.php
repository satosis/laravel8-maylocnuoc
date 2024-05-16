<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLogin extends FormRequest
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
            'email'               =>'required|email|exists:users',
            'password'            =>'required',
        ];
    }
    public function messages(){
        return [
            'email.required'      =>'Bạn cần điền email',
            'password.required'   =>'Bạn cần điền mật khẩu',
            'email.email'         =>"Email không đúng định dạng",
            'email.exists'         =>"Email chưa được đăng ký",
        ];
    }
}
