<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProcessingFeeRequest extends FormRequest
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
            'debit' => 'required|numeric|min:2|max:1000000',
            'description' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'debit.required' => trans('fees.required_amount_Processing'),
            'debit.numeric' => trans('fees.amount_numeric_Processing'),
            'debit.min' => trans('fees.amount_min_Processing'),
            'debit.max' => trans('fees.amount_max_Processing'),
            'description.required' => trans('fees.required_description_Processing'),
            'description.max' => trans('fees.description_max'),
        ];
    }
}
