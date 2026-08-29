<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'school_name' => 'required|string|max:255',

            'current_year' => [
                'required',
                'regex:/^\d{4}-\d{4}$/',
            ],

            'school_title' => 'required|string|max:100',

            'phone' => 'required|string|max:20',

            'email' => 'required|email|max:255',

            'address' => 'required|string|max:255',

            'end_first_term' => 'required|date_format:d-m-Y',

            'end_second_term' => 'required|date_format:d-m-Y',

            'logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'school_name.required' => trans('settings.school_name_required'),
            'school_name.string' => trans('settings.school_name_string'),
            'school_name.max' => trans('settings.school_name_max'),

            'current_year.required' => trans('settings.current_year_required'),
            'current_year.regex' => trans('settings.current_year_regex'),

            'school_title.required' => trans('settings.school_title_required'),
            'school_title.string' => trans('settings.school_title_string'),
            'school_title.max' => trans('settings.school_title_max'),

            'phone.required' => trans('settings.phone_required'),
            'phone.string' => trans('settings.phone_string'),
            'phone.max' => trans('settings.phone_max'),

            'email.required' => trans('settings.email_required'),
            'email.email' => trans('settings.email_email'),
            'email.max' => trans('settings.email_max'),

            'address.required' => trans('settings.address_required'),
            'address.string' => trans('settings.address_string'),
            'address.max' => trans('settings.address_max'),

            'end_first_term.required' => trans('settings.end_first_term_required'),
            'end_first_term.date_format' => trans('settings.end_first_term_date_format'),

            'end_second_term.required' => trans('settings.end_second_term_required'),
            'end_second_term.date_format' => trans('settings.end_second_term_date_format'),

            'logo.required' => trans('settings.logo_required'),
            'logo.image' => trans('settings.logo_image'),
            'logo.mimes' => trans('settings.logo_mimes'),
            'logo.max' => trans('settings.logo_max'),
        ];
    }
}
