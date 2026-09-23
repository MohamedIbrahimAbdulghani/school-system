<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentPromotionRequest extends FormRequest
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
            'grade_id' => 'required|integer|exists:grades,id',
            'classroom_id' => 'required|integer|exists:classrooms,id',
            'section_id' => 'required|integer|exists:sections,id',
            'academic_year' => 'required|integer',
            'grade_id_new' => 'required|integer|exists:grades,id|different:grade_id',
            'classroom_id_new' => 'required|integer|exists:classrooms,id',
            'section_id_new' => 'required|integer|exists:sections,id',
            'new_academic_year' => 'required|integer|different:academic_year',
            ];
    }
    public function messages() {
        return [
            'grade_id.required' => trans('validation.required'),
            'grade_id.exists' => trans('validation.exists'),
            'classroom_id.required' => trans('validation.required'),
            'classroom_id.exists' => trans('validation.exists'),
            'section_id.required' => trans('validation.required'),
            'section_id.exists' => trans('validation.exists'),
            'academic_year.required' => trans('validation.required'),
            'grade_id_new.required' => trans('validation.required'),
            'grade_id_new.exists' => trans('validation.exists'),
            'grade_id_new.different' => trans('validation.different'),
            'classroom_id_new.required' => trans('validation.required'),
            'classroom_id_new.exists' => trans('validation.exists'),
            'section_id_new.required' => trans('validation.required'),
            'section_id_new.exists' => trans('validation.exists'),
            'new_academic_year.required' => trans('validation.required'),
            'new_academic_year.different' => trans('validation.different'),
            ];
        }

    public function attributes() { return [ 'grade_id' => trans('student.old_grade'), 'classroom_id' => trans('student.old_classroom'), 'section_id' => trans('student.old_section'), 'academic_year' => trans('student.old_academic_year'), 'grade_id_new' => trans('student.new_grade'), 'classroom_id_new' => trans('student.new_classroom'), 'section_id_new' => trans('student.new_section'), 'new_academic_year' => trans('student.new_academic_year'), ]; }
}