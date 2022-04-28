<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDepartmentRequest extends FormRequest
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
            'department_name'=>'required',
            'coefficient_salary'=>'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return[
            'department_name.required'=>'Không được để trống!',
            'coefficient_salary.required'=>'Không được để trống',
            
            'coefficient_salary.min'=>'Hệ số lương không được âm',
        ];
    }
}
