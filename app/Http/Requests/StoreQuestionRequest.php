<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'question_name' => 'required',
            'answers' => 'required',
            'right_answer' => 'required',
            'score' => 'required',
            'quizz_id' => 'required'
        ];
    }

    public function messages() {
        return [
            'question_name.required' => trans('questions.required_question_name'),
            'answers.required' => trans("questions.required_answers"),
            'right_answer.required' =>  trans("questions.required_right_answer"),
            'score.required' =>  trans("questions.required_score"),
            'quizz_id.required' =>  trans("questions.required_quizz_id")
        ];
    }
}
