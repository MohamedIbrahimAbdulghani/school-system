<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizzRequest extends FormRequest
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
            'quiz_name_ar' => 'required',
            'quiz_name_en' => 'required',
            'subject_id' => 'required',
            'grade_id'  => 'required',
            'classroom_id' => 'nullable',
            'section_id' => 'nullable',
        ];
    }

    public function messages() {
        return [
            'quiz_name_ar.required' => trans('quizzes.required_ar'),
            'quiz_name_en.required' => trans("quizzes.required_en"),
            'subject_id.required' =>  trans("quizzes.required_subject_id"),
            'grade_id.required' =>  trans("quizzes.required_grade_id"),
        ];
    }
}