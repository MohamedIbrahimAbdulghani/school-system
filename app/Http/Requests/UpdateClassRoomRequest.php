<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassRoomRequest extends FormRequest
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
            'class_name_ar' => 'required|min:3|max:255',
            'class_name_en' => 'required|min:3|max:255',
        ];
    }
    // this function to make message for validations
    public function messages() {
        return [
            'class_name_ar.required' => trans('validation.required'),
            'class_name_en.required' => trans('validation.required'),
            'name.min' => trans('validation.min'),
            'name.max' => trans('validation.max'),
        ];
    }
}