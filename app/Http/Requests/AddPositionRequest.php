<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPositionRequest extends FormRequest
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
            'txt_position'=>'required',
            'txt_basicsalary'=>'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'txt_position.required'=>'Không được để trống!',
            'txt_basicsalary.required'=>'Không được để trống!',
            'txt_basicsalary.min'=>"Hệ số lương không được âm!",
        ];
    }
}
