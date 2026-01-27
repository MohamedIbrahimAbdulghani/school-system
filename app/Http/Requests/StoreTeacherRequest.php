<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreTeacherRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                Rule::unique('teachers', 'email')->ignore($this->input('id')),
            ],
            'password' => 'required|min:2',

            'teacher_name_ar' => 'required|string|max:255',
            'teacher_name_en' => 'required|string|max:255',
            'specialization_id' => 'required|integer|exists:specializations,id',
            'gender_id' => 'required',
            'join_date' => 'required|date',
            'address' => 'required|nullable|string|max:500',
        ];
    }
    
    
}
