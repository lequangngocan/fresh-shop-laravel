<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends FormRequest
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
            'category_name' => 'required|min:3|max:12|unique:category,category_name,'. $this->id,
            'category_image' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min kí tự',
            'max' => ':attribute không được lớn hơn :max kí tự',
            'image' => ':attribute chưa đúng định dạng'
        ];
    }

    public function attributes()
    {
        return [
            'category_name' => 'Tên danh mục',
            'category_image' => 'Ảnh danh mục'
        ];
    }
}
