<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            // 'url' => 'required|url|unique:plans|max:150',
            'url' => 'unique:plans|max:150',
            'price' => 'required|numeric',
            'description' => 'nullable'
        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Nome',
            'url' => 'Site',
            'price' => 'Preco',
        ];
    }
}
