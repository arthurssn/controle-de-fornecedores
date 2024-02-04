<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'cpf_cnpj' => 'string|min:11|required|CpfOuCnpj|unique:suppliers,cpf_cnpj',
            'name' => 'string:min:3|required',
            'email' => 'string|email|unique:suppliers,email',
            'phone' => 'string|unique:suppliers,phone',
            'address' => 'string',
            'number' => 'string',
            'city' => 'string',
            'state' => 'string',
            'country' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'cpf_cnpj.required' => 'O campo CPF/CNPJ é obrigatório',
            'name.required' => 'O campo nome é obrigatório'
        ];
    }
}
