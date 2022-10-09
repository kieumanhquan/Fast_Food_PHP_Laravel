<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuanlyRequest extends FormRequest
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
            'txttennv' => 'required',
            'sltChucvu' => 'required',
            'txtsdt' => 'required|unique:nhanviens,sdt',
            'txtemail' => 'required|unique:nhanviens,email|regex:/(.*)gmail\.com$/i',
            'txtcmnd' => 'required|unique:nhanviens,CMND',
            'txtdiachi' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txttennv.required' => 'Bạn chưa nhập họ tên',
            'sltChucvu.required' => 'Bạn chưa chọn chức vụ',
            'txtsdt.required' => 'Bạn chưa nhập số điện thoại',
            'txtsdt.unique' => 'Số điện thoại này đã tồn tại',
            'txtemail.required' => 'Bạn chưa nhập email',
            'txtemail.regex' => 'Email không đúng',
            'txtemail.unique' => 'Email này đã tồn tại',
            'txtcmnd.required' => 'Bạn chưa nhập CMND',
            'txtcmnd.unique' => 'CMND này đã tồn tại',
            'txtdiachi.required' => 'Bạn chưa nhập địa chỉ'
        ];
    }
}
