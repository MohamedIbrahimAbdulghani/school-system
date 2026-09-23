<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|string|min:2',
            'teacher_name_ar' => 'required|string|max:255',
            'teacher_name_en' => 'required|string|max:255',
            'join_date' => 'required|date',
            'address' => 'required|nullable|string|max:500',
        ];
    }
    public function messages() {
        return [
            'email.required' => trans('teacher.required_email'),
            'email.email' => trans('teacher.invalid_email'),

            'password.required' => trans('teacher.required_password'),
            'password.min' => trans('teacher.password_min'),

            'teacher_name_ar.required' => trans('teacher.required_name_ar'),
            'teacher_name_en.required' => trans('teacher.required_name_en'),
            'join_date.required' => trans('teacher.join_date'),
            'address.required' => trans('teacher.address'),
        ];
    }
}