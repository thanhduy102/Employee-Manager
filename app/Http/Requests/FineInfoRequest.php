<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FineInfoRequest extends FormRequest
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
            'employee'=>'required|not_in:0',
            'fine_reason'=>'required|not_in:0',
            'month'=>'required|not_in:0',
            'year'=>'required|not_in:0',
        ];
    }

    public function messages()
    {
        return [
            'employee.required'=>'Chọn nhân viên',
            'fine_reason.required'=>'Chọn lý do phạt',
            'year.required'=>'Chọn năm',
            'month.required'=>'Chọn tháng',
        ];
    }
}
