<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User extends FormRequest
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
            'user_name' => 'required|min:4|max:16|alpha_dash|unique:users,user_name,'.$this->id,
            'full_name' => 'required|min:6|max:30',
            'password' => 'required|min:8|max:16',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'phone_number' => 'required|numeric|digits:10'
        ];
    }
    public function messages(){
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min kí tự',
            'max' => ':attribute không được lớn hơn :max kí tự',
            'email' => ':attribute bạn nhập chưa đúng',
            'numeric' => ':attribute bạn nhập chưa đúng',
            'digits' => ':attribute bạn nhập phải là 10 số',
            'alpha_dash' => ':attribute không đúng định dạng'
        ];
    }
    public function attributes(){
        return [
            'user_name' => 'Tên đăng nhập',
            'full_name' => 'Họ và tên',
            'password' => 'Mật khẩu',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            'phone_number' => 'Số điện thoại'
        ];
    }
}
