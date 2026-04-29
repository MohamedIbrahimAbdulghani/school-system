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
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        DB::beginTransaction(); // start transaction
        try {
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
        // store images
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $image->storeAs('attachments/students/' . $student->name, $name, 'uploda_attachments');
                Image::create([
                    'filename' => $name,
                    'imageable_id' => $student->id,
                    'imageable_type' => 'App\Models\Students',
                ]);
            }
        }

        if ($student) {
            toastr()->success(trans('messages.success'));
        } else {
            toastr()->error(trans('messages.error'));
        }

            DB::commit(); // insert data in database

        } catch (\Exception $e) {
            DB::rollBack(); // if any error rollback all data
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
            return redirect()->route('students.index');
    }

    public function showStudent($id) {
        $student = Students::findOrFail($id);
        return view('pages.Students.show_student', compact('student'));
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
        $student = Students::whereIn('id', $ids)->delete();

        if ($student) {
            toastr()->success(trans('messages.delete'));
        }
        return back();
    }

    public function uploadStudentAttachments($request, $id) {
        $student = Students::findOrFail($id);
        // Storage photo
        if($request->hasFile('photos')) {
            foreach($request->file('photos') as $photo) {
                $name = $photo->getClientOriginalName();
                $photo->storeAs('attachments/students/' . $student->name, $name, 'upload_attachments');
                Image::create([
                    'filename' => 'attachments/students/' . $student->name . '/' . $name,
                    'imageable_id' => $student->id,
                    'imageable_type' => 'App\Models\Students',
                ]);
            }
        }
        toastr()->success(trans('messages.upload'));
        return back();
    }

    public function deleteStudentAttachments($id) {
        $image = Image::findOrFail($id);

        if (Storage::disk('upload_attachments')->exists($image->filename)) {
            Storage::disk('upload_attachments')->delete($image->filename);
        }

        $image->delete();

        toastr()->success(trans('messages.delete'));
        return back();
    }
}