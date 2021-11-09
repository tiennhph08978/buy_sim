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
            //
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
        ];
    }
    public function messages(){
        return[
            'email.required'=>'Vui lòng điền thông tin!',
            'email.email'=>'Vui lòng điền đúng định dạng!',
            'email.exists'=>'Tài khoản chưa được đăng kí!',
            'password.required'=>'Vui lòng điền thông tin!',
            // 'password.exists'=>'Mật khẩu sai!',
        ];
    }
}
