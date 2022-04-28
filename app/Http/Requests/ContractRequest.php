<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'txt_employee'=>'required|not_in:0',
            'txt_type_contract'=>'required|not_in:0',
            'sign_day'=>'required',
            'expiration_date'=>'required|after:sign_day',
        ];
    }

    public function messages()
    {
        return [
            'txt_employee.required'=>'Phải chọn nhân viên!',
            'txt_type_contract.required'=>'Phải chọn loại hợp đồng!',
            'sign_day.required'=>'Không được để trống ngày bắt đầu',
            'expiration_date.required'=>'Không được để trống ngày kết thúc!',
            'expiration_date.after'=>'Nhập sau ngày bắt đầu!',
        ];
    }
}
