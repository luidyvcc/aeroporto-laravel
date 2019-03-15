<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class BrandStoreUpdateFormRequest extends FormRequest
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
        //$id = Request::get('id');
        $id = Request::segment(3);// http://127.0.0.1:8000/panel/brands/1 <- segmento 3 = 1

        return [
            'name' => "required|min:3|max:150|unique:brands,name,{$id},id",
        ];
    }
}
