<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddWorkDayRequest extends FormRequest
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
             'year'=>'numeric|min:0|not_in:0|required|unique:salary_year,salary_year',
            
            // 'select_year'=>'required',
            // 'select_month'=>'required',
        
        ];
    }

    public function messages()
    {
        return [
            'year.numeric'=>'Không được để trống!',
            'year.min'=>'Số năm không được âm!',
            'year.unique'=>'Không được trùng!',
            // 'year.required'=>'Không được để trống1!',

            
        ];
    }
}
