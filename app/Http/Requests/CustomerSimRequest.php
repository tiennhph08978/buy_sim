<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerSimRequest extends FormRequest
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
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'name'=>'required|min:5|max:50',
            'address'=>'required|min:5|max:100'
        ];
    }
    public function messages(){
        return[
            'phone.required'=>'Vui lòng không được để trống!',
            'phone.regex'=>'Vui lòng điền đúng định dạng sdt!',
            'name.required'=>'Vui lòng không được để trống!',
            'name.min'=>'Tên bạn vui lòng điền trên 5 kí tự!',
            'name.max'=>'Tên bạn vui lòng điền dưới 50 kí tự!',
            'address.required'=>'Vui lòng không được để trống!',
            'address.min'=>'Tên bạn vui lòng điền trên 5 kí tự!',
            'address.max'=>'Tên bạn vui lòng điền dưới 100 kí tự!',
        ];
    }
}
