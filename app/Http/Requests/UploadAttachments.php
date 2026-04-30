<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadAttachments extends FormRequest
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
            'files' => 'required|array',
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];
    }
    public function messages() {
        return [
        'files.required' => trans('validation.files_required'),
        'files.array'    => trans('validation.files_array'),
        'files.*.mimes'  => trans('validation.files_mimes'),
        'files.*.max'    => trans('validation.files_max'),
        ];
    }
}