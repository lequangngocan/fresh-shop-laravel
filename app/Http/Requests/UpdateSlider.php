<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSlider extends FormRequest
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
            'slide_title' => 'required|min:5|max:32',
            'slide_image' => 'image',
            'slide_detail' => 'required|min:5',
            'link' => 'required|min:5'
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min kí tự',
            'max' => ':attribute không được lớn hơn :max kí tự',
            'image' => ':attribute không đúng định dạng'
        ];
    }
    public function attributes(){
        return [
            'slide_title' => 'Tiêu đề slide',
            'slide_image' => 'Ảnh slide',
            'slide_detail' => 'Nội dung slide',
            'link' => 'Link'
        ];
    }
}
