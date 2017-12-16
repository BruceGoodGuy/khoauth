<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class lyricRequest extends FormRequest
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
            'lyric'=>'required',
        ];
    }
    public function messages()
    {
        return [
            //
            'lyric.required'=>'Bạn phải nhập lời vào',
        ];
    }
}
