<?php

namespace App\Http\Requests\user;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'alpha_num',
            'birth_date' => 'date',
            'cpf' => 'digits:11',
            'address' => 'required|min:6',
            'cep' => 'digits:8',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([

            'mensagem' => 'Erro de validação',

            'erros' => $validator->errors()

        ], 422));
    }
}
