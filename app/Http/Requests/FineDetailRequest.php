<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FineDetailRequest extends FormRequest
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
            'txt_finename'=>'required',
            'txt_fine'=>'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'txt_finename.required'=>'Không được để trống!',
            'txt_fine.required'=>'Không được để trống!',
            'txt_fine.min'=>"Tiền thưởng không được âm!",
        ];
    }
}
