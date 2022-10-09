<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhmucRequest extends FormRequest
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
            'txtdanhmuc' =>'required|unique:danhmuc,tendanhmuc'
        ];
    }
    public function messages()
    {
        return [
          'txtdanhmuc.required' =>'Chưa nhập tên danh mục',
           'txtdanhmuc.unique' =>'Danh mục đã có'
        ];
    }
}
