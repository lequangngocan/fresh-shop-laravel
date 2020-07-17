<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'user_name' => 'required|min:4|max:16|alpha_dash|unique:users,user_name',
            'full_name' => 'required|min:6|max:30',
            'password' => 'required|min:8|max:16',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'phone_number' => 'required|numeric|digits:10'
        ];
    }
    public function messages(){
        return [
            'unique' => ':attribute already exists',
            'required' => ':attribute must enter data',
            'min' => ':attribute must be bigger than :min characters',
            'max' => ':attribute must be smaller than :max characters',
            'email' => ':attribute entered is in the wrong format',
            'numeric' => ':attribute entered is in the wrong format',
            'digits' => ':attribute entered is in the wrong format',
            'alpha_dash' => ':attribute entered is in the wrong format'
        ];
    }
    public function attributes(){
        return [
            'user_name' => 'Username',
            'full_name' => 'Fullname',
            'password' => 'Password',
            'email' => 'Email',
            'address' => 'Address',
            'phone_number' => 'Phone number'
        ];
    }
}
