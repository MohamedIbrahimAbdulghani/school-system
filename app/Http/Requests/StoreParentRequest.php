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
            'father_national_id' => 'required|digits_between:11,20',
            'father_passport_id' => 'required|digits_between:11,20',
            'father_phone' => ['required', 'digits_between:11,20'],
            'father_nationality_id' => 'required|integer|exists:nationalities,id',
            'father_blood_type_id' => 'required|integer|exists:type_bloods,id',
            'father_religion_id' => 'required|integer|exists:religions,id',
            'father_address' => 'required|nullable|string|max:500',

            // الأم
            'mother_name' => 'required|string|max:255',
            'mother_name_en' => 'required|string|max:255',
            'mother_job' => 'required|nullable|string|max:255',
            'mother_job_en' => 'required|nullable|string|max:255',
            'mother_national_id' => 'required|digits_between:11,20',
            'mother_passport_id' => 'required|digits_between:11,20',
            'mother_phone' => ['required', 'digits_between:11,20'],
            'mother_nationality_id' => 'required|integer|exists:nationalities,id',
            'mother_blood_type_id' => 'required|integer|exists:type_bloods,id',
            'mother_religion_id' => 'required|integer|exists:religions,id',
            'mother_address' => 'required|nullable|string|max:500',
        ];
    }

     public function attributes()
    {
        return [
            'email' => trans('parent.Email'),
            'password' => trans('parent.Password'),
            'father_name' => trans('parent.Name_Father'),
            'father_name_en' => trans('parent.Name_Father_en'),
            'father_job' => trans('parent.Job_Father'),
            'father_job_en' => trans('parent.Job_Father_en'),
            'father_national_id' => trans('parent.National_ID_Father'),
            'father_passport_id' => trans('parent.Passport_ID_Father'),
            'father_phone' => trans('parent.Phone_Father'),
            'father_nationality_id' => trans('parent.Nationality_Father_id'),
            'father_blood_type_id' => trans('parent.Blood_Type_Father_id'),
            'father_religion_id' => trans('parent.Religion_Father_id'),
            'father_address' => trans('parent.Address_Father'),

            'mother_name' => trans('parent.Name_Mother'),
            'mother_name_en' => trans('parent.Name_Mother_en'),
            'mother_job' => trans('parent.Job_Mother'),
            'mother_job_en' => trans('parent.Job_Mother_en'),
            'mother_national_id' => trans('parent.National_ID_Mother'),
            'mother_passport_id' => trans('parent.Passport_ID_Mother'),
            'mother_phone' => trans('parent.Phone_Mother'),
            'mother_nationality_id' => trans('parent.Nationality_Mother_id'),
            'mother_blood_type_id' => trans('parent.Blood_Type_Mother_id'),
            'mother_religion_id' => trans('parent.Religion_Mother_id'),
            'mother_address' => trans('parent.Address_Mother'),
        ];
    }

    public function messages() {
        return [
            'required' => 'هذا الحقل مطلوب',
            'integer' => 'يجب اختيار قيمة صحيحة',
            'exists' => 'القيمة المختارة غير صحيحة',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'password.min' => 'كلمة المرور يجب ألا تقل عن 2 أحرف',
        ];
    }
    
}
