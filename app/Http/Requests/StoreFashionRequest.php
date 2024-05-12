<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFashionRequest extends FormRequest
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
            "title"=>"required|unique:fashions,title|max:100",
            "content"=>"required"
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Judul tidak boleh kosong',
            'title.unique' => 'Judul sudah ada',
            'title.max' => 'Kontent maksimal 100 karakter',
            'content.required' => 'Konten tidak boleh kosong',
        ];
    }

}
