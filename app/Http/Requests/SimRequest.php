<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimRequest extends FormRequest
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
            'phone_number'=>'required|unique:sim|regex:/^([0-9\s\-\+\(\)]*)$/',
            'price'=>'required|numeric',
        ];
    }
    public function messages(){
        return [
            'phone_number.required'=>'Không được để trống!',
            'phone_number.unique'=>'Số điện thoại đã tồn tại!',
            'phone_number.numeric'=>'Bạn phải nhập số!',
            'phone_number.regex'=>'Bạn phải nhập đúng định dạng số điện thoại!',
            'price.required'=>'Không được để trống!',
            'price.numeric'=>'Bạn phải nhập số!'
        ];
    }
}
