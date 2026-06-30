<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeeInvoiceRequest extends FormRequest
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
            'fee_id' => 'required',
            'amount'  => 'required|numeric',
            'description' => 'required',
        ];
    }

    public function messages() {
        return [
            'fee_id.required' => trans("fees.required_fee_id"),
            'amount.required' =>  trans("fees.required_amount"),
            'description.required' =>  trans("fees.required_description"),
        ];
    }
}
