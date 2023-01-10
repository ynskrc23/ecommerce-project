<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            "name" => "required",
            "slug" => "required|sometimes|unique:App\Models\Category,slug,$this->category_id",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Bu alan zorunludur",
            "slug.required" => "Bu alan zorunludur",
            "slug.unique" => "Girdiğiniz :attribute sisteme kayıtlıdır",
        ];
    }
}
