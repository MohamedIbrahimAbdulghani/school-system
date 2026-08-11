<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRefundsRequest extends FormRequest
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
            'amount' => 'required|numeric|min:2|max:1000000',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => trans('fees.required_amount_payment_vouchers_Processing'),
            'amount.numeric' => trans('fees.amount_numeric'),
            'amount.min' => trans('fees.amount_min'),
            'amount.max' => trans('fees.amount_max'),
            'description.required' => trans('fees.required_description_payment_vouchers_Processing'),
        ];
    }
}
