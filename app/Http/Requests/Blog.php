<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Blog extends FormRequest
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
            'news_title' => 'required|min:5|unique:news,news_title',
            'news_image' => 'required|image',
            'news_detail' => 'required'
        ];
    }
    public function messages(){
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min kí tự',
            'image' => ':attribute không đúng định dạng'
        ];
    }
    public function attributes(){
        return [
            'news_title' => 'Tiêu đề tin tức',
            'news_image' => 'Ảnh tin tức',
            'news_detail' => 'Chi tiết tin tức'
        ];
    }
}
