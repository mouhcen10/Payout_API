<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankRequest extends FormRequest
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
            'user_id' => 'required|unique:banks',
            'bank_name' => 'required',
            'bank_country' => 'required',
            'country_iso' => 'required|min:2|max:2',
            'iban' => 'required|min:28|max:28',
            'bic' => 'required|min:6|max:11',
        ];
    }
}
