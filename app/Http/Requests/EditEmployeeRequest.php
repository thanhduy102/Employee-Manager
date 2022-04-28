<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditEmployeeRequest extends FormRequest
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
            'txt_name'=>'required',
            'txt_gender'=>'required|not_in:0|required',
            'txt_level'=>'required|not_in:0|required',
            'txt_position'=>'required|not_in:0|required',
            'txt_department'=>'required|not_in:0|required',
        ];
    }
    public function messages()
    {
        return [
            'txt_name.required'=>'Không được để trống tên!',

           

            'txt_gender.required'=>'Vui lòng chọn giới tính',
            'txt_level.required'=>'Vui lòng chọn trình độ',
            'txt_position.required'=>'Vui lòng chọn chức vụ',
            'txt_department.required'=>'Vui lòng chọn phòng ban',
        ];
    }
}
