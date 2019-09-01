<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
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
            'shipping_data_country' => 'required|unique:orders|min:5|max:50',
            'shipping_data_city' => 'required|unique:orders|min:5|max:50',
            'shipping_data_adsress' => 'required|unique:orders|min:5|max:50',
            'total_price' => 'required|numeric|min:1',
        ];
    }
}
