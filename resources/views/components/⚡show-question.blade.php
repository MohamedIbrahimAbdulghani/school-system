<?php

use Livewire\Component;
use App\Models\Question;
use App\Models\Degree;

new class extends Component
{
    public $quizz_id;
    public $student_id;
    public $data;
    public $question = 0; // this is first question in database
    public $questioncount = 0; // this is number of questions

    public function mount() {
        $this->data = Question::where('quizz_id', $this->quizz_id)->get();
        $this->questioncount = $this->data->count(); // count Questions

        // VALDIATION ABOUT QUESTIONS
        if ($this->questioncount !== 0) {
            toastr()->info('برجاء عدم إعادة تحميل الصفحة بعد دخول الاختبار - في حال تم تنفيذ ذلك سيتم إلغء الاختبار بشكل تلقائي');
        } else {
            toastr()->error('لا يوجد أسئلة في هذا الاختبار');
            return redirect('student_exams');
        }
    }

    public function nextQuestion($question_id, $score, $answer, $right_answer) {
        $student_degree = Degree::where('student_id', $this->student_id)
        ->where('quizz_id', $this->quizz_id)
        ->first();


        if($student_degree == null) {
            $degree = new Degree();

            $degree->quizz_id = $this->quizz_id;
            $degree->student_id = $this->student_id;
            $degree->question_id = $question_id;

            if(strcmp(trim($answer), trim($right_answer)) === 0) { // strcmp() this is function to compare between letters in words, and trim() this is function to remove space from words
                $degree->score += $score;
            } else {
                $degree->score += 0;
            }

            $degree->date = date('Y-m-d');
            $degree->save();

        } else {
            // UPDATE
            if($student_degree->question_id >= $this->data[$this->question]->id) {
                $student_degree->score = 0;
                $student_degree->abuse = '1';
                $student_degree->save();
                toastr()->error('تم الغاء الاختبار لإكتشاف تلاعب بالنظام');
                return redirect('student_exams');
            } else {
                $student_degree->question_id  = $question_id;

                if(strcmp(trim($answer), trim($right_answer)) === 0) { // strcmp() this is function to compare between letters in words, and trim() this is function to remove space from words
                    $student_degree->score += $score;
                } else {
                    $student_degree->score += 0;
                }
                $student_degree->save();
            }
        }

        if($this->question < $this->questioncount - 1 ) {
            $this->question++;
        } else {
            toastr()->success('تم اجراء الاخبتار بنجاح');
            return redirect('student_exams');
        }

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
                        <label class="custom-control-label" style="margin-top: 0" for="customRadio{{ $index }}" wire:click="nextQuestion({{ $data[$question]->id }}, {{ $data[$question]->score }}, @js($answer), @js($data[$question]->right_answer))" > {{ $answer }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
