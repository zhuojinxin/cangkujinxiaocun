<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class changeduty extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Author: 卓金鑫
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()['duty'] == 1){
            return true;

        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'id'=>['required'],
            'duty'=>['required']

        ];
    }
}
