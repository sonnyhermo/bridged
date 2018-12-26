<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncomeRequest extends FormRequest
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
            'employer_address' => 'required',
            'employer_email' => 'required',
            'employer_name' => 'required',
            'employer_tel' => 'required',
            'industry' => 'required',
            'monthly_income' => 'required',
            'operation_length' => 'required',
            'position' => 'required',
            'source' => 'required'
        ];
    }
}
