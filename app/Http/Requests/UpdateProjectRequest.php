<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
    public function rules()
    {
            return [
                'title' => [
                    'required',
                    'max:200',
                    'min:3',
                    Rule::unique('projects')->ignore($this->project->id),
                ],
                'image' => 'nullable|image|max:255',
                'content' => 'required|min:3',
                'slug' => 'max:255'
            ];
    }

    public function messages() {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno 3 caratteri',
            'title.max' => 'Il titolo deve avere massimo 200 caratteri',
            'content.required' => 'Il contenuto è obbligatorio',
            'content.min' => 'Il contenuto deve avere almeno 3 caratteri',
            'image.max' => 'L url della immagine deve avere massimo 255 caratteri',
        ];
    }
}
