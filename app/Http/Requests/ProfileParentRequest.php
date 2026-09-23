<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileParentRequest extends FormRequest
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
            'father_name' => 'required',
            'father_name_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'father_name.required' => trans('parent.required_father_name'),
            'father_name_en.required' => trans('parent.required_father_name_en'),
        ];
    }
}