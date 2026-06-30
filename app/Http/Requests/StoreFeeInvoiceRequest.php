<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeeInvoiceRequest extends FormRequest
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
        'list_fees' => 'required|array',

        'list_fees.*.student_id' => 'required',
        'list_fees.*.fee_id' => 'required',
        'list_fees.*.amount' => 'required',
        'list_fees.*.description' => 'required',
        ];
    }

    public function messages() {
        return [
        'list_fees.*.student_id.required' => trans('fees.required_student_id'),
        'list_fees.*.fee_id.required' => trans('fees.required_fee_id'),
        'list_fees.*.amount.required' => trans('fees.required_amount'),
        'list_fees.*.description.required' => trans('fees.required_description'),
        ];
    }
}
