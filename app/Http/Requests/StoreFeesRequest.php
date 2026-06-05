<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeesRequest extends FormRequest
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
            'amount'  => 'required|numeric',
            'notes' => 'required',
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:class_rooms,id',
            'section_id'  => 'required|exists:sections,id',
            'year' => 'required'
        ];
    }

    public function messages() {
        return [
            'name_ar.required' => trans('fees.required_ar'),
            'name_en.required' => trans("fees.required_en"),
            'amount.required' =>  trans("fees.required_fees_amount"),
            'notes.required' => trans("fees.required_notes"),
            'grade_id.required'     => trans("fees.required_grade_id"),
            'classroom_id.required' => trans("fees.required_classroom_id"),
            'section_id.required' => trans('fees.required_section_id'),
            'year.required'   => trans("fees.required_year"),
        ];
    }
}
