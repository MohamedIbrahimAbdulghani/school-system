<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromotionsRequest extends FormRequest
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
            'grade_id'         => 'required',
            'classroom_id'     => 'required',
            'section_id'       => 'required',
            'grade_id_new'     => 'required',
            'classroom_id_new' => 'required',
            'section_id_new'   => 'required',
        ];
    }
    public function messages() {
        return [
            'grade_id.required'         => trans('promotions.from_grade_required'),
            'classroom_id.required'     => trans('promotions.from_classroom_required'),
            'section_id.required'       => trans('promotions.from_section_required'),
            'grade_id_new.required'     => trans('promotions.to_grade_required'),
            'classroom_id_new.required' => trans('promotions.to_classroom_required'),
            'section_id_new.required'   => trans('promotions.to_section_required'),
        ];
    }
}
