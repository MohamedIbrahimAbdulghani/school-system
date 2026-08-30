<?php


namespace App\Repository;

use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;

class GraduatedRepository implements GraduatedRepositoryInterface {

    public function index() {
        $graduated_students = Student::onlyTrashed()->get();
        return view('pages.Students.Graduates.index', compact('graduated_students'));
    }

    public function create() {
        $Grades = Grade::all();
        return view('pages.Students.Graduates.add_graduate', compact('Grades'));
    }

    public function store($request) {

        $students = Student::where('grade_id', $request->grade_id)
                    ->where('classroom_id', $request->classroom_id)
                    ->where('section_id', $request->section_id)
                    ->get();
        // if students is empty
        if($students->count() == 0) {
            toastr()->error(trans('student.not_found_students'));
            return redirect()->back();
        }
        foreach ($students as $student) {
            $ids = explode(',',$student->id); // return ids about array like [1,2,3] ...elc
            Student::whereIn('id', $ids)->delete(); // in this case will delete student but use SoftDelete
        }
        toastr()->success(trans('student.graduated_successfully'));
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $student = Student::onlyTrashed()->findOrFail($id)->forceDelete();
        toastr()->success(trans('student.deleted_successfully'));
        return redirect()->back();
    }

    public function restore($id)
    {
        $student = Student::onlyTrashed()->findOrFail($id)->restore();
        toastr()->success(trans('student.restore_successfully'));
        return redirect()->back();
    }

    public function graduateStudent($id) {

            Student::findOrFail($id)->delete(); // Soft Delete
            Promotion::where('student_id', $id)->delete(); // delete promotion record for the student

            toastr()->success(trans('student.graduated_successfully'));

            return redirect()->back();
    }
}


