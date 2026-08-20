<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamRequest extends FormRequest
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
            'exam_name_ar' => 'required',
            'exam_name_en' => 'required',
            'term' => 'required',
            'academic_year' => 'required',
        ];
    }

    public function messages() {
        return [
            'exam_name_ar.required' => trans('exams.required_ar'),
            'exam_name_en.required' => trans("exams.required_en"),
            'term.required' =>  trans("exams.required_term"),
            'academic_year.required' =>  trans("exams.required_academic_year")
        ];
    }
}