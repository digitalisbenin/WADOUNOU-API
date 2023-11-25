<?php

namespace App\Http\Requests\Commande;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCommandeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'adresse' => 'required',
            'contact' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:En attente,livrer,non livrer,Affecter',
            'repas_id' => 'required',
            'user_id' => 'nullable',
            'restaurant_id' => 'nullable',
            'montant' => 'required',
            'quantite' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}
