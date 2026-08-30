<?php

namespace App\Repository;
use App\Models\Quiz;

use App\Models\Question;

class QuestionsRepository implements  QuestionsRepositoryInterface {
    public function index() {
        $questions = Question::all();
        return view('pages.Questions.index', compact('questions'));
    }

    public function create() {
        $quizzes = Quiz::all();
        return view('pages.Questions.create', compact('quizzes'));
    }

    public function show($id) {
        return "show function";
    }

    public function store($request) {
        try {
            Question::create([
                'title' => $request->question_name,
                'answers' => $request->answers,
                'right_answer' => $request->right_answer,
                'score' => $request->score,
                'quizz_id'=> $request->quizz_id
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('questions.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]); 
        }
    }

    public function edit($id) {
        $quizzes = Quiz::all();
        $question = Question::findOrFail($id);
        return view('pages.Questions.edit', compact('question', 'quizzes'));
    }

    public function update($request) {
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
            return redirect()->route('questions.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]); 
        }
    }

    public function destroy($id) {
        try{
            Question::findOrFail($id)->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('questions.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]); 
        }
    }
}


