<?php

namespace App\Repository;

use App\Models\ClassRooms;
use App\Models\Grades;
use App\Models\Quizz;
use App\Models\Subjects;
use App\Models\Teachers;

class QuizzesRepository implements QuizzesRepositoryInterface
{
    public function index()
    {
        $quizzes = Quizz::all();
        return view('pages.Quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $grades = Grades::all();
        $teachers = Teachers::all();
        $classrooms = ClassRooms::all();
        $subjects = Subjects::all();

        return view('pages.Quizzes.create', compact('grades', 'teachers', 'classrooms', 'subjects'));
    }

    public function show($request)
    {
        //TODO: Implement show() method.
    }

        public function store($request)
    {
        try {
            Quizz::create([
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
        $quizz = Quizz::findOrFail($request);
        $grades = Grades::all();
        $teachers = Teachers::all();
        $classrooms = ClassRooms::all();
        $subjects = Subjects::all();

        return view('pages.Quizzes.edit', compact('quizz', 'grades', 'teachers', 'classrooms', 'subjects'));
    }

        public function update($request)
    {
        try {
            $quizz = Quizz::findOrFail($request->id);
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
            Quizz::findOrFail($id)->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('quizzes.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
