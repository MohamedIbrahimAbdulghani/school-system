<?php

return [

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',

    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',

    'alpha' => 'The :attribute must contain only letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',

    'array' => 'The :attribute must be an array.',

    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',

    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],

    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',

    'date' => 'The :attribute is not a valid date.',
    'date_format' => 'The :attribute does not match the format :format.',

    'email' => 'The :attribute must be a valid email address.',

    'file' => 'The :attribute must be a file.',

    'image' => 'The :attribute must be an image.',

    'max' => [
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
        'numeric' => 'The :attribute may not be greater than :max.',
    ],

    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',

    'min' => [
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
        'numeric' => 'The :attribute must be at least :min.',
    ],

    'required' => 'The :attribute field is required.',

    'string' => 'The :attribute must be a string.',
    'unique' => 'The :attribute has already been taken.',
    'url' => 'The :attribute must be a valid URL.',

    // 📌 FILES CUSTOM
    'files' => 'attachments',
    'files_required' => 'Please upload at least one file.',
    'files_array'    => 'The uploaded data must be files.',
    'files_mimes'    => 'Only JPG, JPEG, PNG images or PDF files are allowed.',
    'files_max'      => 'Each file must not exceed 2MB.',

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'files' => 'attachments',
        'email' => 'email address',
        'password' => 'password',
        'image' => 'image',
        'phone' => 'phone number',
        'Name_Section_Ar' => 'section name (Arabic)',
        'Name_Section_En' => 'section name (English)',
    ],
];