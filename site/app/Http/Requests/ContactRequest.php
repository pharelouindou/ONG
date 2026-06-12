<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Veuillez indiquer votre nom.',
            'email.required' => 'Veuillez indiquer votre adresse email.',
            'email.email' => 'L\'adresse email n\'est pas valide.',
            'message.required' => 'Veuillez rédiger votre message.',
        ];
    }
}
