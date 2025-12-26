<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentAddRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer|min:1|max:100',
            // 'date_of_birth' => 'required|date',
            'gender' => 'required|in:m,f',
            'score' => 'required|numeric|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please write Student Name.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already taken. Please use a different one.',
            'age.max' => 'Student cannot be older than 100.',
            // 'date_of_birth.required' => 'The date of birth field is required.',
            // 'date_of_birth.date' => 'Please provide a valid date for date of birth
        ];
    }
}
