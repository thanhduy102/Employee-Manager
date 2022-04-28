<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLevelRequest extends FormRequest
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
            'txt_level'=>'required',
            'txt_hesoluong'=>'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'txt_level.required'=>'Không được để trống!',
            'txt_hesoluong.required'=>'Không được để trống',
            
            'txt_hesoluong.min'=>'Hệ số lương không được âm',
         
        ];
    }
}
