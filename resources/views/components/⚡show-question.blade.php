<?php

use Livewire\Component;
use App\Models\Question;

new class extends Component
{
    public $quizz_id;
    public $student_id;
    public $data;
    public $question = 0; // this is first question in database

    public function mount() {
        $this->data = Question::where('quizz_id', $this->quizz_id)->get();
    }
};
?>

<div>
    <div>
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <h5 class="card-title">{{ $data[$question]->title }}</h5>
                @foreach (preg_split('/\*/', $data[$question]->answers, -1, PREG_SPLIT_NO_EMPTY) as $index => $answer)
                    <div class="mt-2 custom-control custom-radio">
                        <input type="radio" name="customRadio" id="customRadio{{ $index }}" class="custom-control-input"  >
                        <label class="custom-control-label" style="margin-top: 0" for="customRadio{{ $index }}" wire:click="nextQuestion({{ $data[$question]->id }}, {{ $data[$question]->score }}, '{{ $answer }}', '{{ $data[$question]->right_answer }}')" > {{ $answer }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
