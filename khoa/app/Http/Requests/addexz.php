<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addexz extends FormRequest
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
            'da'=>'required',
            'db'=>'required',
            'dc'=>'required',
            'dd'=>'required'
        ];
    }
    public function messages()
    {
        return [
            //
            'da.required'=>"Nhập đáp án A",
            'db.required'=>"Nhập đáp án B",
            'dc.required'=>"Nhập đáp án C",
            'dd.required'=>"Nhập đáp án D",
        ];
    }
}
