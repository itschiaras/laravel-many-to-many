<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:projects|min:10',
            'image' => 'max:255',
            'description' => 'max:3000',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|exists:technologies,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.unique:projects' => 'Il titolo è già esistente',
            'title.min' => 'Il titolo deve essere di almeno :min caratteri',
            'image.max' => 'Inserire massimo :max caratteri',
            'description.max' => 'Inserire massimo :max caratteri'
        ];
    }
}
