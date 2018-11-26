<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonalInfoRequest extends FormRequest
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
            'gender' => 'required',
            'nationality' => 'required',
            'civil_status' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'mother_maiden' => 'required',
            'present_street' => 'required',
            'present_city' => 'required',
            'present_province' => 'required',
            'present_stay_length' => 'required',
            'present_ownership' => 'required',
            'permanent_street' => 'required',
            'permanent_city' => 'required',
            'permanent_province' => 'required',
            'permanent_stay_length' => 'required',
            'permanent_ownership' => 'required'
        ];
    }
}
