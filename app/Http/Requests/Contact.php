<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Contact extends FormRequest
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
            'full_name' => 'required|min:6|max:30',
            'subject' => 'required|min:6|max:30',
            'email' => 'required|email',
            'message' => 'required'
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute must enter data',
            'min' => ':attribute must be bigger than :min characters',
            'max' => ':attribute must be smaller than :max characters',
            'email' => ':attribute entered is in the wrong format',
        ];
    }
    public function attributes(){
        return [
            'full_name' => 'Fullname',
            'subject' => 'Subject',
            'email' => 'Email',
            'message' => 'message'
        ];
    }
}
