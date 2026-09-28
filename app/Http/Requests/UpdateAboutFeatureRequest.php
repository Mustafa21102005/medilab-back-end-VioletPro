<?php

namespace App\Http\Requests;

use App\Enums\IconKey;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateAboutFeatureRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'icon' => ['required', new Enum(IconKey::class)],
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'order' => 'required|integer|min:1',
        ];
    }
}
