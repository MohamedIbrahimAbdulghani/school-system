<?php


namespace App\Repository;

use App\Models\Grades;
use App\Models\promotion;
use App\Models\Students;

class StudentPromotionsRepository implements StudentPromotionsRepositoryInterface {
    public function index() {
        $Grades = Grades::all();
        return view('pages.Students.Promotions.index',compact('Grades'));
    }

    public function store($request) {
        $students = Students::where('grade_id', $request->grade_id)
            ->where('classroom_id', $request->classroom_id)
            ->where('section_id', $request->section_id)
            ->get();

        if ($students->isEmpty()) {
            return redirect()->back()->with('error_promotions', trans('student.no_students_found'));
        }

        // update students
        Students::whereIn('id', $students->pluck('id'))->update([
            'grade_id' => $request->grade_id_new,
            'classroom_id' => $request->classroom_id_new,
            'section_id' => $request->section_id_new
        ]);

        // create promotion
        foreach($students as $student) {
            promotion::updateOrCreate([
                'student_id' => $student->id
            ], [
                'student_id' => $student->id,
                'from_grade' => $request->grade_id,
                'from_classroom' => $request->classroom_id,
                'from_section' => $request->section_id,
                'to_grade' => $request->grade_id_new,
                'to_classroom' => $request->classroom_id_new,
                'to_section' => $request->section_id_new
            ]);
        }

        toastr()->success(trans('messages.update'));
        return redirect()->route('promotions.index');
    }
}