<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\loginModel;
class dangki extends FormRequest
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
            'username'=>'required|unique:users|min:5|max:20',
            'password'=>'required|min:6|max:20',
            'repassword'=>'required|min:6|max:20',
            'email'=>'required|email|unique:users|min:15|max:30'

        ];
    }
    public function messages()
    {
        return [
            //
            'username.required'=>'Chưa nhập username',
            'username.unique'=>'Tên bị trùng',
            'username.min'=>'Username quá ít',
            'username.max'=>'Username quá nhiều',
            'password.required'=>'Chưa nhập password',
            'password.min'=>'Password quá ngắn',
            'password.max'=>'Password quá dài',
            'repassword.required'=>'Chưa nhập repassword',
            'repassword.min'=>'repassword quá ngắn',
            'repassword.max'=>'repassword quá dài',
            'email.required'=>'Chưa nhập email',
            'email.email'=>'Sai định dạng email',
            'email.unique'=>'Email bị trùng',
            'email.min'=>'Email quá ngắn',
            'email.max'=>'Email quá dài',
        ];
    }
}
