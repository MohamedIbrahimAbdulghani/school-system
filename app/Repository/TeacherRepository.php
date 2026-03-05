<?php

namespace App\Repository;
use App\Models\Teachers;
use App\Models\Specializations;
use App\Models\Genders;
use Illuminate\Support\Facades\Hash;


class TeacherRepository implements TeacherRepositoryInterface {
        // this is function to get all teachers from database by this design patteren
    public function getTeachers() {
        return Teachers::all();
    }
        // this is function to get teacher by id from database by this design patteren
    public function getTeacherById($id) {
        return Teachers::where('id', $id)->get();
    }
        // this is function to get specializations from database by this design patteren
    public function getSpecializations() {
        return Specializations::all();
    }
        // this is function to store genders from database by this design patteren
    public function getGenders() {
        return Genders::all();
    }
    // this is function to store teacher in database by this design patteren
    public function storeTeacher($request) {
        $teacher = Teachers::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => ['ar' => $request->teacher_name_ar, 'en' => $request->teacher_name_en],
            'specialization_id' => $request->specialization_id,
            'gender_id' => $request->gender_id,
            'join_date' => $request->join_date,
            'address' => $request->address,
        ]);
        if ($teacher) {
            toastr()->success(trans('messages.success'));
        } else {
            toastr()->error(trans('messages.error'));
        }
            return redirect()->route('teachers.index');
    }

    // this is function to edit teacher from database by this design patteren
    public function editTeacher($id) {
        return Teachers::findOrFail($id);
    }


    // this is function to update teacher in database by this design patteren
    public function updateTeacher($request, $id) {
        $teacher = Teachers::find($id)->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => ['ar' => $request->teacher_name_ar, 'en' => $request->teacher_name_en],
            'specialization_id' => $request->specialization_id,
            'gender_id' => $request->gender_id,
            'join_date' => $request->join_date,
            'address' => $request->address,
        ]);
        if($teacher) {
            toastr()->success(trans('messages.update'));
        } else {
            toastr()->error(trans('messages.error'));
        }
        return redirect()->route('teachers.index');
    }

    // this is function to delete teacher from database by this design patteren
    public function deleteTeacher($id) {
        $teacher = Teachers::findOrFail($id);
        $teacher->delete();
        toastr()->success(trans('messages.delete'));
        return redirect()->route('teachers.index');
    }

}