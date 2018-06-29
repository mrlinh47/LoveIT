<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'fullname' => 'required|regex:/^[a-zA-Z ]+$/',
            'email' => 'required',
            'username' => 'required|unique:mll02_users,username',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
            'level'      => 'required'
        ];
    }

    public function messages()
{
    return [
        'fullname.required'  => 'Please enter FullName',
        'fullname.regex'  => 'FullName only characters',
        'email.required'  => 'Please enter Email',
        'password.min'       => 'Password is not min 6 characters',
        'username.required'  => 'Please enter UserName',
        'username.unique'  => 'Username is exist',
        'password.required'  => 'Please enter Password',
        'password.min'       => 'Password is not min 6 characters',
        'repassword.required'  => 'Please enter Re-Password',
        'repassword.same'       => 'Re-Password is not the same Password',
        'level.required'  => 'Please choose Level',
    ];
}
}
