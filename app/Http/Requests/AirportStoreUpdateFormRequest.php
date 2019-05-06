<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirportStoreUpdateFormRequest extends FormRequest
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
            'city_id' => 'required|exists:cities,id', 
            'name' => 'required|min:3|max:150', 
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required|min:3|max:150',
            'number' => 'required|numeric',
            'zip_code' => 'required',
            'complement' => 'required'
        ];
    }
}
