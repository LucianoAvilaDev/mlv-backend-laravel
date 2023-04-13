<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'regex:/^[A-Za-z0-9]+$/',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'required|min:6|regex:/^[A-Za-z0-9]+$/',
            'birth_date' => 'date',
            'cpf' => 'required|min:11|max:11|unique:users,cpf,' . $this->user->id,
            'address' => 'required|min:6|regex:/^[A-Za-z0-9]+$/',
            'cep' => 'numeric|required|min:11|max:8',
            'is_admin' => 'boolean'
        ];
    }
}