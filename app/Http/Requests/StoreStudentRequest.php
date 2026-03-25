<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:students,email,'.$this->id,
            'password' => 'required|min:3',
            'gender_id' => 'required',
            'nationality_id' => 'required',
            'blood_type_id' => 'required',
            'birth_date' => 'required|date|date_format:Y-m-d',
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'name_ar' => trans("student.name_ar"),
            'gender_id' =>'',
            'nationality_id' => trans("student.Nationality"),
            'blood_type_id' =>  trans("student.blood_type"),
            'birth_date' => trans("student.Date_of_Birth"),
            'grade_id'     => trans("student.Grade"),
            'classroom_id' => trans("student.classrooms"),
            'section_id'   => trans("student.section"),
            'parent_id'    => trans("student.parent"),
            'academic_year'=> trans("student.academic_year"),
        ];
    }
}