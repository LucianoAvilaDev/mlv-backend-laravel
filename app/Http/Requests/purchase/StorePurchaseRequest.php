<?php

namespace App\Http\Requests\purchase;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class StorePurchaseRequest extends FormRequest
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
            'client_id' => 'required',
            'date_time' => 'required|date_format:Y-m-d H:i:s',
            'total' => 'required|numeric',
            'item_products' => 'array|required|min:1'
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