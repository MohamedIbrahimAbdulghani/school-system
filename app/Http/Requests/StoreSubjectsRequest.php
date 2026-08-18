<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectsRequest extends FormRequest
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
            'subject_name_ar' => 'required',
            'subject_name_en' => 'required',
            'grade_id'  => 'required',
            'classroom_id' => 'required',
            'teacher_id' => 'required',
        ];
    }

    public function messages() {
        return [
            'subject_name_ar.required' => trans('subjects.required_ar'),
            'subject_name_en.required' => trans("subjects.required_en"),
            'grade_id.required' =>  trans("subjects.required_grade_id"),
            'classroom_id.required' =>  trans("subjects.required_classroom_id"),
            'teacher_id.required' =>  trans("subjects.required_teacher_id")
        ];
    }
}