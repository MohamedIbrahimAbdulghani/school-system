<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOnlineClassRequest extends FormRequest
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
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
            'section_id' => 'required|exists:sections,id',
            'topic' => 'required|string|max:255',
            'start_at' => 'required|date',
            'duration' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'grade_id.required' => trans('online_classes.required_grade_id'),
            'grade_id.exists' => trans('online_classes.invalid_grade_id'),

            'classroom_id.required' => trans('online_classes.required_classroom_id'),
            'classroom_id.exists' => trans('online_classes.invalid_classroom_id'),

            'section_id.required' => trans('online_classes.required_section_id'),
            'section_id.exists' => trans('online_classes.invalid_section_id'),

            'topic.required' => trans('online_classes.required_topic'),
            'topic.string' => trans('online_classes.invalid_topic'),
            'topic.max' => trans('online_classes.topic_max'),

            'start_at.required' => trans('online_classes.required_start_at'),
            'start_at.date' => trans('online_classes.invalid_start_at'),

            'duration.required' => trans('online_classes.required_duration'),
            'duration.integer' => trans('online_classes.invalid_duration'),
            'duration.min' => trans('online_classes.duration_min'),
        ];
    }
}
