<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGradeRequest extends FormRequest
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
            // 'name' => 'required|min:3|max:255|unique:grades,name',
            // 'name_en' => 'required|min:3|max:255|unique:grades,name_en',
            'name' => [
            'required',
            'min:3',
            'max:255',
            Rule::unique('grades', 'name->ar')->ignore($this->id)
        ],
        'name_en' => [
            'required',
            'min:3',
            'max:255',
            Rule::unique('grades', 'name->en')->ignore($this->id)
        ],
        ];
    }
    // this function to make message for validations
    public function messages() {
        return [
            'name.required' => trans('validation.required'),
            'name.unique' => trans('validation.unique'),
            'name.min' => trans('validation.min'),
            'name.max' => trans('validation.max'),
            'name_en.required' => trans('validation.required'),
            'name_en.unique' => trans('validation.unique'),
            'name_en.min' => trans('validation.min'),
            'name_en.max' => trans('validation.max'),
        ];
    }
}
