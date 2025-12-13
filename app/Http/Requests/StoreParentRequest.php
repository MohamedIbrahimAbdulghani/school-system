<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParentRequest extends FormRequest
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
            'email' => 'required|email|unique:my_parents,email',
            'password' => 'required|min:2',

            // الأب
            'father_name' => 'required|string|max:255',
            'father_name_en' => 'required|string|max:255',
            'father_job' => 'required|nullable|string|max:255',
            'father_job_en' => 'required|nullable|string|max:255',
            'father_national_id' => 'required|min:11|max:20',
            'father_passport_id' => 'required|min:11|max:20',
            'father_phone' => 'required|min:11|max:15',
            'father_nationality_id' => 'required|integer|exists:nationalities,id',
            'father_blood_type_id' => 'required|integer|exists:type_bloods,id',
            'father_religion_id' => 'required|integer|exists:religions,id',
            'father_address' => 'required|nullable|string|max:500',

            // الأم
            'mother_name' => 'required|string|max:255',
            'mother_name_en' => 'required|string|max:255',
            'mother_job' => 'required|nullable|string|max:255',
            'mother_job_en' => 'required|nullable|string|max:255',
            'mother_national_id' => 'required|min:11|max:20',
            'mother_passport_id' => 'required|min:11|max:20',
            'mother_phone' => 'required|min:11|max:15',
            'mother_nationality_id' => 'required|integer|exists:nationalities,id',
            'mother_blood_type_id' => 'required|integer|exists:type_bloods,id',
            'mother_religion_id' => 'required|integer|exists:religions,id',
            'mother_address' => 'required|nullable|string|max:500',

            'file_name' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];
    }


    public function messages() {
        return [
            'required' => trans('parent.required'),
            'integer' => trans('parent.integer'),
            'exists' => trans('parent.exists'),
            'email.email' => trans('parent.email.email'),
            'password.min' => trans('parent.password.min'),
        ];
    }
    
}
