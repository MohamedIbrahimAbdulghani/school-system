<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassRoomRequest extends FormRequest
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
            'List_Classes' => 'required|array|min:1',
            'List_Classes.*.class_name_ar' => 'required|min:3|max:255',
            'List_Classes.*.class_name_en' => 'required|min:3|max:255',
            'List_Classes.*.grade_id' => 'required',
        ];
    }
    // this function to make message for validations
    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'min' => trans('validation.min.string'),
            'max' => trans('validation.max.string'),
        ];
    }

    public function attributes()
    {
        return [
            'List_Classes.*.class_name_ar' => trans('validation.attributes.class_name_ar'),
            'List_Classes.*.class_name_en' => trans('validation.attributes.class_name_en'),
            'List_Classes.*.grade_id' => trans('validation.attributes.grade_id'),
        ];
    }

}
