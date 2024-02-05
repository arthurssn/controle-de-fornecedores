<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $supplierId = $this->route('supplier') ? $this->route('supplier') : null;

        return [
            'cpf_cnpj' => [
                'string',
                'min:11',
                'required',
                'CpfOuCnpj',
                Rule::unique('suppliers')->ignore($supplierId),
            ],
            'name' => 'string|min:3|required',
            'email' => [
                'string',
                'email',
                Rule::unique('suppliers')->ignore($supplierId),
            ],
            'phone' => [
                'string',
                Rule::unique('suppliers')->ignore($supplierId),
            ],
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
            'name.required' => 'O campo nome é obrigatório',
            'cpf_cnpj.unique' => 'CPF/CNPJ já cadastrado',
            'email.unique' => 'E-mail já cadastrado',
            'phone.unique' => 'Telefone já cadastrado',
        ];
    }
}
