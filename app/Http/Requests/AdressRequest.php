<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdressRequest extends FormRequest
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
            "user_id" => "required|numeric",
            "city" => "required|min:3",
            "district" => "required|min:3",
            "zipcode" => "required|min:3",
            "address" => "required|min:3",
        ];
    }

    public function messages()
    {
        return [
            "user_id.required" => "Bu alan zorunludur",
            "user_id.numeric" => "Bu alan sayısal olmak zorunludur",
            "city.required" => "Bu alan zorunludur",
            "city.min" => "City alanı en az 3 karakter olmalıdır",
            "district.required" => "Bu alan zorunludur",
            "district.min" => "District alanı en az 3 karakter olmalıdır",
            "address.required" => "Bu alan zorunludur",
            "address.min" => "Address alanı en az 3 karakter olmalıdır",
        ];
    }
}
