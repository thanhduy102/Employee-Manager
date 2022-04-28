<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BonusDetailRequest extends FormRequest
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
            'txt_bonusname'=>'required',
            'txt_bonus'=>'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'txt_bonusname.required'=>'Không được để trống!',
            'txt_bonus.required'=>'Không được để trống!',
            'txt_bonus.min'=>"Tiền thưởng không được âm!",
        ];
    }
}
