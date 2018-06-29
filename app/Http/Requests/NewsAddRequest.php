<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsAddRequest extends FormRequest
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
            'sltCate' => 'required',
            'txtTitle' => 'required|unique:mll02_news,title',
            'fImages' => 'image|mimes:png,jpg,jpeg,bmp',
        ];
    }
    public function messages(){
        return [
            'sltCate.required' => 'Vui lòng chọn danh mục',
            'txtTitle.required' => 'Vui lòng nhập tiêu đề',
            'txtTitle.unique' => 'Tiêu đề đã tồn tại',
            'fImages.image' => 'Đây phải là hình ảnh',
            'fImages.mimes' => 'Hình của bạn phải có đuôi: png,jpg,jpeg,bmp'
        ];
    }
}
