<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhoTonRequest extends FormRequest
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
            'txtsanpham' =>'required|unique:khohang,sanphamkho',
            'txtsoluong' => 'required',
            'txtgiamua' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'txtsanpham.required' =>'Chưa nhập tên sản phẩm',
            'txtsanpham.unique' =>'Sản phẩm đó đã có, hãy xem lại',
            'txtsoluong.required' =>'Chưa nhập số lượng',
            'txtgiamua.required' =>'Chưa nhập giá mua',
        ];
    }
}
