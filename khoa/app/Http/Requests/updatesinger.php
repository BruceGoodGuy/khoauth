<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updatesinger extends FormRequest
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
            'name'=>'required',
            'bio'=>'required',
            //
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Bạn chưa nhập tên',
            'bio.required' =>'Bạn chưa nhập thông tin'
            //
        ];
    }
}
