<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateSimRequest extends FormRequest
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
            'name'=>'required|unique:cate_sim|min:4|max:50',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Tên không được để trống!',
            'name.unique'=>'Tên đã tồn tại',
            'name.min'=>'Tên không được dưới 4 kí tự',
            'name.max'=>'Tên không được quá 50 kí tự'
        ];
    }
}
