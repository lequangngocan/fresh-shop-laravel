<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product extends FormRequest
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
            'product_name' => 'required|min:5|max:32|unique:product,product_name',
            'product_image' => 'required|image',
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'amount' => 'required|numeric'
        ];
    }
    public function messages(){
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min kí tự',
            'max' => ':attribute không được lớn hơn :max kí tự',
            'numeric' => ':attribute phải là một số',
            'image' => ':attribute không đúng định dạng : jpeg, jpg, png, gif'
        ];
    }
    public function attributes(){
        return [
            'product_name' => 'Tên sản phẩm',
            'product_image' => 'Ảnh sản phẩm',
            'price' => 'Giá',
            'sale_price' => 'Giá khuyến mãi',
            'amount' => 'Số lượng'
        ];
    }
}
