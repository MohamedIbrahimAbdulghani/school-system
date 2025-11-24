<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
            'Name_Section_Ar' => 'required|min:1|max:255',
            'Name_Section_En' => 'required|min:1|max:255',
            'Grade_id'        => 'required|exists:grades,id',
            'Class_id'        => 'required|exists:class_rooms,id',
        ];
    }
    // this function to make message for validations
    public function messages()
    {
        return [
            'Name_Section_Ar.required' => trans('section.required_ar'),
            'Name_Section_En.required' => trans('section.required_en'),
            'Grade_id.required' => trans('section.Grade_id_required'),
            'Class_id.required' => trans('section.Class_id_required'),
        ];
    }

}
