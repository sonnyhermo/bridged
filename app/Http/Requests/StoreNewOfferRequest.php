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
            'bank_id' => 'required|integer',
            'loan_id' => 'required|integer',
            'purpose_id' => 'required|integer',
            'product' => 'required',
            'min' => 'required|numeric',
            'max' => 'required|numeric'
            'terms_rate' => 'required|mimes:xlsx,xls'
        ];
    }
}
