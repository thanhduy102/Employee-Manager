<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditWorkDayRequest extends FormRequest
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
            'txt_number_worked'=>'nullable|numeric|min:0',
            'txt_number_overtime'=>'nullable|numeric|min:0',
            // 'select_month'=>'required|not_in:0',
            // 'select_year'=>'required|not_in:0',
        ];

    }

    public function messages()
    {
        return [
            'txt_number_worked.min'=>'Không được nhỏ hơn 0',
            'txt_number_overtime.min'=>'Không được nhỏ hơn 0',
            // 'select_month.required'=>'Phải chọn tháng',
            // 'select_year.required'=>'Phải chọn năm',
        ];
    }
}
