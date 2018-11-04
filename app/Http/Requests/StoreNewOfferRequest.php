<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewOfferRequest extends FormRequest
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
            'bank_id' => 'required|integer',
            'classification_id' => 'required|integer',
            'product' => 'required',
            'min' => 'required|numeric',
            'max' => 'required|numeric',
            'min_income' => 'required|numeric'
            //'terms_rate' => 'required|mimes:xlsx,xls'
        ];
    }
}
