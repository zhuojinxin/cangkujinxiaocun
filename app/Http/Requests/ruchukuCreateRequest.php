<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ruchukuCreateRequest extends FormRequest
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
            'user_id'=>[
                'required',
                Rule::exists('users','id')
            ],
            'good_id'=>[
                'required',
                Rule::exists('goods','id')
            ],
            'warehouse_id'=>[
                'required',
                Rule::exists('warehouses','id')
            ],
        ];
    }
}
