<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required",
            "email"=>"required|unique:users,email|max:100",
            "password"=>"required",
            "password_confirmation"=>"same:password"
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah ada',
            'email.max' => 'Kontent maksimal 100 karakter',
            'password.required' => 'Password tidak boleh kosong',
            'password_confirmation.same' => 'Password tidak cocok',
        ];
    }
}
