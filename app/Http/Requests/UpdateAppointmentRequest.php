<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAppointmentRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'datetime' => 'required|date|after:now',
            'department_id' => 'required|exists:departments,id',
            'doctor_id' => [
                'required',
                Rule::exists('doctors', 'id')->where(function ($query) {
                    $query->where('department_id', $this->department_id);
                }),
            ],
            'message' => 'nullable|string|max:1000',
        ];
    }
}
