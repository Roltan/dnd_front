<?php

namespace App\Http\Requests\Hero;

use Illuminate\Foundation\Http\FormRequest;

class GeneralInfoRequest extends FormRequest
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
        return [
            'hero_name' => ['required', 'filled', 'string'],
            'lvl' => ['required', 'numeric', 'min:1', 'max:20'],
            'exp' => ['nullable', 'numeric', 'min:0', 'max:355000'],
            'klass' => ['required', 'filled', 'string'],
            'sub_klass' => ['nullable', 'string'],
            'race' => ['required', 'filled', 'string'],
            'sub_race' => ['nullable', 'string'],
            'background' => ['required', 'filled', 'string'],
        ];
    }
}
