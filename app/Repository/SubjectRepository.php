<?php

namespace App\Repository;

use App\Models\Genders;
use App\Models\Grades;
use App\Models\Subjects;
use App\Models\Teachers;

class SubjectRepository implements SubjectRepositoryInterface
{
    public function index()
    {
        $subjects = Subjects::all();
        return view('pages.Subjects.index', compact('subjects'));
    }

    public function create()
    {
        $grades = Grades::all();
        $teachers = Teachers::all();
        return view('pages.Subjects.create', compact('grades', 'teachers'));
    }
    public function store($request)
    {
        try {
            Subjects::create([
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
        $subject = Subjects::findOrFail($id);
        $grades = Grades::all();
        $teachers = Teachers::all();
        return view('pages.Subjects.edit', compact('subject', 'grades', 'teachers'));
    }
    public function update($request, $id)
    {
        try {
            Subjects::findOrFail($id)->update([
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
        Subjects::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.delete'));
        return redirect()->route('subjects.index');
    }
}