<?php

namespace App\Repository;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Quiz;
use App\Models\Subject;
use App\Models\Teacher;

class QuizzesRepository implements QuizzesRepositoryInterface
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('pages.Quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        $subjects = Subject::all();

        return view('pages.Quizzes.create', compact('grades', 'teachers', 'classrooms', 'subjects'));
    }

    public function show($request)
    {
        //TODO: Implement show() method.
    }

        public function store($request)
    {
        try {
            Quiz::create([
            'name' => ['ar' => $request->quiz_name_ar, 'en' => $request->quiz_name_en],
            'subject_id' => $request->subject_id,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'section_id' => $request->section_id,
            'teacher_id' => $request->teacher_id
        ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

        public function edit($request)
    {
        $quizz = Quiz::findOrFail($request);
        $grades = Grade::all();
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        $subjects = Subject::all();

        return view('pages.Quizzes.edit', compact('quizz', 'grades', 'teachers', 'classrooms', 'subjects'));
    }

        public function update($request)
    {
        try {
            $quizz = Quiz::findOrFail($request->id);
            $quizz->update([
            'name' => ['ar' => $request->quiz_name_ar, 'en' => $request->quiz_name_en],
            'subject_id' => $request->subject_id,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'section_id' => $request->section_id,
            'teacher_id' => $request->teacher_id
        ]);
            toastr()->success(trans('messages.update'));
            return redirect()->route('quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

        public function destroy($id)
    {
        try {
            Quiz::findOrFail($id)->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('quizzes.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}


