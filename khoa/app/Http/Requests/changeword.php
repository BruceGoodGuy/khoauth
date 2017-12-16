<?php

namespace App\Http\Requests;
use app\word;
use Illuminate\Foundation\Http\FormRequest;

class changeword extends FormRequest
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
           'word'=>'required',
           'pronun'=>'required',
           'typeword'=>'required',
           'meaning'=>'required',
           'exeng'=>'required',
           'exvie'=>'required'
        ];
    }
    public function messages()
    {
        return [
           'word.required'=>'Chưa nhập Word',
           'pronun.required'=>'Chưa nhập pronun',
           'typeword.required'=>'Chưa nhập typeword',
           'meaning.required'=>'Chưa nhập meaning',
           'exeng.required'=>'Chưa nhập exeng',
           'exvie.required'=>'Chưa nhập exvie'
        ];
    }
}
