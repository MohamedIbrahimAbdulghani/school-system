<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeesRequest extends FormRequest
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
            'type_fees' => 'required',
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'year' => 'required'
        ];
    }

    public function messages() {
        return [
            'name_ar.required' => trans('fees.required_ar'),
            'name_en.required' => trans("fees.required_en"),
            'amount.required' =>  trans("fees.required_fees_amount"),
            'type_fees.required' =>  trans("fees.required_fees_amount"),
            'grade_id.required'     => trans("fees.required_grade_id"),
            'classroom_id.required' => trans("fees.required_classroom_id"),
            'classroom_id.unique' => trans("fees.unique"),
            'year.required'   => trans("fees.required_year"),
        ];
    }
}
