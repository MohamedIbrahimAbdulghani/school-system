<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibraryRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:class_rooms,id',
            'section_id' => 'required|exists:sections,id',
            'file_name' => 'required|file',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('libraries.required_title'),

            'grade_id.required' => trans('libraries.required_grade_id'),
            'grade_id.exists' => trans('libraries.invalid_grade_id'),

            'classroom_id.required' => trans('libraries.required_classroom_id'),
            'classroom_id.exists' => trans('libraries.invalid_classroom_id'),

            'section_id.required' => trans('libraries.required_section_id'),
            'section_id.exists' => trans('libraries.invalid_section_id'),

            'file_name.required' => trans('libraries.required_file_name'),
            'file_name.file' => trans('libraries.invalid_file_name'),
        ];
    }
}