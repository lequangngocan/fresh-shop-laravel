<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Forgot extends FormRequest
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
            'password' => 'required|min:8|max:16'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute must enter data',
            'min' => ':attribute must be bigger than :min characters',
            'max' => ':attribute must be smaller than :max characters'
        ];
    }
    public function attributes(){
        return [
            'password' => 'Password'
        ];
    }
}
