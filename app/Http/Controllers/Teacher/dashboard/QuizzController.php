<?php

namespace App\Http\Controllers\Teacher\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuizzRequest;
use App\Http\Requests\UpdateQuizzRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::where('teacher_id', auth('teacher')->user()->id)->get();
        return view('pages.Teachers.dashboard.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::all();
        $subjects = Subject::where('teacher_id', auth('teacher')->user()->id)->get();
        return view('pages.Teachers.dashboard.quizzes.create', compact('grades', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizzRequest $request)
    {
        try {
            Quiz::create([
            'name' => ['ar' => $request->quiz_name_ar, 'en' => $request->quiz_name_en],
            'subject_id' => $request->subject_id,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'section_id' => $request->section_id,
            'teacher_id' => auth('teacher')->user()->id
        ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('quizze.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $questions = Question::where('quizz_id', $id)->get();
        $quizz = Quiz::findOrFail($id);
        // $quizzes = Quiz::all();
        return view('pages.Teachers.dashboard.questions.index', compact('questions', 'quizz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quizz = Quiz::findOrFail($id);
        $grades = Grade::all();
        $classrooms = Classroom::all();
        $subjects = Subject::all();

        return view('pages.Teachers.dashboard.quizzes.edit', compact('quizz', 'grades', 'classrooms', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizzRequest $request, string $id)
    {
        try {
            $quizz = Quiz::findOrFail($id);
            $quizz->update([
            'name' => ['ar' => $request->quiz_name_ar, 'en' => $request->quiz_name_en],
            'subject_id' => $request->subject_id,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id ?? $quizz->classroom_id,
            'section_id' => $request->section_id ?? $quizz->section_id,
            'teacher_id' => auth('teacher')->user()->id,
        ]);
            toastr()->success(trans('messages.update'));
            return redirect()->route('quizze.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Quiz::findOrFail($id)->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('quizze.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
