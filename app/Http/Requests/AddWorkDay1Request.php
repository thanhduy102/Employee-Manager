<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddWorkDay1Request extends FormRequest
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
            // 'year'=>'numeric|min:0|not_in:0|required|unique:salary_year,salary_year',
            
            'select_year'=>'required|not_in:0',
            'select_month'=>'required|not_in:0',
            'txt_number'=>'nullable|min:0|numeric',
            'txt_number1'=>'nullable|min:0|numeric',

        ];
    }

    public function messages()
    {
        return [
            // 'year.numeric'=>'Không được để trống!',
            // 'year.min'=>'Số năm không được âm!',
            // 'year.unique'=>'Không được trùng!',
            // 'year.require'=>'Không được để trống!',
            'select_year.required'=>'Phải chọn năm và tháng',
            'select_month.required'=>'Phải chọn tháng',
            'txt_number.min'=>'Số không được âm',
            'txt_number1.min'=>'Số không được âm',
        ];
    }
}
