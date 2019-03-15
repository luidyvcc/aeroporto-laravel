<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaneStoreUpdateFormRequest extends FormRequest
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
            'brand_id'          => 'required|exists:brands,id',
            'qty_passengers'    => 'required|integer',
            'class'             => 'required|in:economic,luxury',
        ];
    }
}
