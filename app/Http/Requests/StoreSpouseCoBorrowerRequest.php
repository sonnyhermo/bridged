<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpouseCoBorrowerRequest extends FormRequest
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
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'birth_date' => 'required',
            'residence_address' => 'required',
            'employer' => 'required',
            'industry' => 'required',
            'employer_address' => 'required',
            'position' => 'required',
            'tenure' => 'required'
        ];
    }
}
