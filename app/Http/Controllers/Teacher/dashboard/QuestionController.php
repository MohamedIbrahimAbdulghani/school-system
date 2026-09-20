<?php

namespace App\Http\Controllers\Teacher\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return view('pages.Teachers.dashboard.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quizzes = Quiz::where('teacher_id', auth('teacher')->user()->id)->get();
        return view('pages.Teachers.dashboard.questions.create', compact('quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        try {
            Question::create([
                'title' => $request->question_name,
                'answers' => $request->answers,
                'right_answer' => $request->right_answer,
                'score' => $request->score,
                'quizz_id'=> $request->quizz_id
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('quizze.show', $request->quizz_id);
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quizz_id = $id;
        return view('pages.Teachers.dashboard.questions.create', compact('quizz_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quizzes = Quiz::all();
        $question = Question::findOrFail($id);
        return view('pages.Teachers.dashboard.questions.edit', compact('question', 'quizzes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreQuestionRequest $request, string $id)
    {
        try {
            $question = Question::findOrFail($request->id);
            $question->update([
                'title' => $request->question_name,
                'answers' => $request->answers,
                'right_answer' => $request->right_answer,
                'score' => $request->score,
                'quizz_id'=> $request->quizz_id
            ]);
            toastr()->success(trans('messages.update'));
            return redirect()->route('quizze.show', $request->quizz_id);
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Question::findOrFail($id)->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->back();
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
