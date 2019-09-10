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
            'user_id'=>'required',
            'shipping_data_country' => 'required|min:5|max:50',
            'shipping_data_city' => 'required|min:5|max:50',
            'shipping_data_address' => 'required|min:5|max:50',
            'total_price' => 'required|numeric|min:1',
            'status_id' => 'required',
            'name' => 'required|min:2|max:30',
            'surname' => 'required|min:2|max:30',
            'phone_number' => 'required|max:20',
            'email' => 'required',
        ];
    }
}
