<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHeroSectionRequest extends FormRequest
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
            'main_title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:1000',
            'why_choose_title' => 'required|string|max:255',
            'why_choose_text' => 'required|string|max:1000',
            'background_image' => 'sometimes|image|mimes:png,jpg,jpeg,webp|max:5120'
        ];
    }
}
