<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRestaurantRequest extends FormRequest
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
            'phone' => 'required',
            'adresse' => 'required',
            'description' => 'required',
            'image_url' => 'required',
            'specilite' => 'required',
            'heure_douverture' => 'required',
            'heure_fermeture' => 'required',
            'document_url' => 'required',
            'capacite' => 'required',
            'user_id' => 'required',
            'abonnement_id' => 'nullable',
            
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
