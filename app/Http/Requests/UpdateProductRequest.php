<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'sku' => 'required|min:8|max:20',
            'title' => 'required|min:5|max:50',
            'description' => 'required|min:5|max:250',
            'short_description' => 'required|min:5|max:100',
            'price' => 'required|numeric|min:1',
            'in_stock' => 'required|numeric|min:1',
            'thumbnail' => 'required|image'
        ];
    }
}
