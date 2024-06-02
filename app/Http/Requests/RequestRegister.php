<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            'email'             =>'required|email|min:5|max:180|unique:users,email',
            'name'              =>'required|min:5|max:180',
            'password'          =>'required|min:8|max:16',
            'phone'             =>'required|min:10|max:11|unique:users,phone',

        ];
    }
    public function messages(){
        return[
            'email.required'    =>"Bạn cần điền email",
            'email.min'         =>"Email phải lớn hơn 5 ký tự",
            'email.max'         =>"Email phải ít hơn 180 ký tự",
            'email.unique'      =>"Email đã được đăng ký",
            'email.email'       =>"Email không đúng định dạng",

            'name.required'     =>"Bạn cần điền tên người dùng",
            'name.min'          =>"Tên người dùng phải lớn hơn 5 ký tự",
            'name.max'          =>"Tên người dùng phải ít hơn 180 ký tự",

            'password.required' =>"Bạn cần điền mật khẩu",
            'password.min'      =>"Mật khẩu phải lớn hơn 8 ký tự bao gồm chữ và số",
            'password.max'      =>"Mật khẩu phải ít hơn 16 ký tự bao gồm chữ và số",
            'password.regex'    =>"Mật khẩu phải bao gồm chữ và số",

            'phone.required'    =>"Bạn cần điền số điện thọai",
            'phone.min'         =>"Số điện thoại tối thiểu 10 số",
            'phone.max'         =>"Số điện thoại tối đa 11 số",
            'phone.unique'      =>"Số điện thoại đã được đăng ký",

        ];
    }
}
