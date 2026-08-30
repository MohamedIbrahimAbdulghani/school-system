<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectRepository implements SubjectRepositoryInterface
{
    public function index()
    {
        $subjects = Subject::all();
        return view('pages.Subjects.index', compact('subjects'));
    }

    public function create()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Subjects.create', compact('grades', 'teachers'));
    }
    public function store($request)
    {
        try {
            Subject::create([
                'name' => ['ar' => $request->subject_name_ar, 'en' => $request->subject_name_en],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'teacher_id' => $request->teacher_id
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('subjects.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('messages.error'));
        }
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Subjects.edit', compact('subject', 'grades', 'teachers'));
    }
    public function update($request, $id)
    {
        try {
            Subject::findOrFail($id)->update([
                'name' => ['ar' => $request->subject_name_ar, 'en' => $request->subject_name_en],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'teacher_id' => $request->teacher_id
        ]);
            toastr()->success(trans('messages.update'));
            return redirect()->route('subjects.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('messages.error'));
        }
    }
    public function destroy($request)
    {
        Subject::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.delete'));
        return redirect()->route('subjects.index');
    }
}

