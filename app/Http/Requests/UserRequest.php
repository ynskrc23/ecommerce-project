<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $user_id = $this->request->get('user_id');
        return [
            "name" => "required|sometimes|min:3",
            "email" => "required|sometimes|email|unique:App\Models\User,email,$user_id",
            "password" => "required|sometimes|string|min:6|confirmed",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Bu alan zorunludur",
            "name.min" => "Ad soyad alanı en az 3 karakter olmalıdır",
            "email.required" => "Bu alan zorunludur",
            "email.unique" => "Girdiğiniz email sistemde kayıtlıdır",
            "email.email" => "Girdiğiniz değer email formatına uygun değildir",
            "password.required" => "Bu alan zorunludur",
            "password.min" => "Şifre alanı en az 6 karakter olmalıdır",
            "password.confirmed" => "Girilen değerler aynı değildir",
        ];
    }
}
