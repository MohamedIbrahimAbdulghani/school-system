<?php

namespace App\Repository;

use App\Models\ClassRooms;
use App\Models\Genders;
use App\Models\Grades;
use App\Models\MyParents;
use App\Models\Nationalitie;
use App\Models\Sections;
use App\Models\Students;
use App\Models\TypeBloods;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface {
    public function getStudents() {
        return Students::all();
    }
    public function getStudentById($id) {
        return Students::findOrFail($id);
    }
    public function getGenders() {
        return Genders::all();
    }
    public function getGrades() {
        return Grades::all();
    }
    public function getParents() {
        return MyParents::all();
    }
    public function getNationalities() {
        return Nationalitie::all();
    }
    public function getType_Bloods() {
        return TypeBloods::all();
    }
    public function getClassrooms($id) {
        return ClassRooms::where('grade_id', $id)->pluck('name_class', 'id');
    }
    public function getSections($id) {
        return Sections::where('classroom_id', $id)->pluck('name', 'id');
    }

    public function storeStudent($request) {
        $student = Students::create([
            'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender_id' => $request->gender_id,
            'nationality_id' => $request->nationality_id,
            'blood_type_id' => $request->blood_type_id,
            'birth_date' => $request->birth_date,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'section_id' => $request->section_id,
            'parent_id' => $request->parent_id,
            'academic_year' => $request->academic_year,
        ]);
        if ($student) {
            toastr()->success(trans('messages.success'));
        } else {
            toastr()->error(trans('messages.error'));
        }
            return redirect()->route('students.index');
    }

    public function updateStudent($request, $id) {
        $student = Students::findOrFail($id)->update([
            'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender_id' => $request->gender_id,
            'nationality_id' => $request->nationality_id,
            'blood_type_id' => $request->blood_type_id,
            'birth_date' => $request->birth_date,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'section_id' => $request->section_id,
            'parent_id' => $request->parent_id,
            'academic_year' => $request->academic_year,
        ]);
        if($student) {
            toastr()->success(trans('messages.update'));
        } else {
            toastr()->error(trans('messages.error'));
        }
        return redirect()->route('students.index');
    }

    public function deleteStudent($id) {
        $student = Students::findOrFail($id);
        $student->delete();
        toastr()->success(trans('messages.delete'));
        return redirect()->route('students.index');
    }

    // this is function to delete all students
    public function deleteAllStudents($ids) {
        // لو $ids جاية كسلسلة نصية "1,2,3"
        if (is_string($ids)) {
            $ids = explode(',', $ids);
        }
        // حذف الطلاب
        Students::whereIn('id', $ids)->delete();

        return [
            'status' => 'success',
            'message' => trans('messages.delete')
        ];
    }

}