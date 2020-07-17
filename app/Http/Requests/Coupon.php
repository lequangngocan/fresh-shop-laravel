<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Coupon extends FormRequest
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
            'coupon_name' => 'required|min:5|max:16|unique:coupon,coupon_name,'.$this->id,
            'coupon_code' => 'required|min:5|max:16|alpha_dash|unique:coupon,coupon_code,'.$this->id,
            'coupon_detail' => 'required|min:5|max:50'
        ];
    }
    public function messages(){
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min kí tự',
            'max' => ':attribute không được lớn hơn :max kí tự',
            'alpha_dash' => ':attribute không đúng định dạng'
        ];
    }
    public function attributes(){
        return [
            'coupon_name' => 'Tên mã giảm giá',
            'coupon_code' => 'Mã giảm giá',
            'coupon_detail' => 'Chi tiết mã giảm giá'
        ];
    }
}
