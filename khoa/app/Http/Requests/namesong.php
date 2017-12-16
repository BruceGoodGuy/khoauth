<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class namesong extends FormRequest
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
            'name'=>"required|max:100",
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>"Bạn phải nhập tên bài",
            'name.max'=>"Nhập quá số lượng ký tự"
        ];
    }
}
