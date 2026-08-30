<?php

namespace App\Repository;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use App\Models\TypeBlood;
use Illuminate\Support\Facades\Hash;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface {
    public function getStudents() {
        return Student::all();
    }
    public function getStudentById($id) {
        return Student::findOrFail($id);
    }
    public function getGenders() {
        return Gender::all();
    }
    public function getGrades() {
        return Grade::all();
    }
    public function getParents() {
        return MyParent::all();
    }
    public function getNationalities() {
        return Nationality::all();
    }
    public function getType_Bloods() {
        return TypeBlood::all();
    }
    public function getClassrooms($id) {
        return Classroom::where('grade_id', $id)->pluck('name_class', 'id');
    }
    public function getSections($id) {
        return Section::where('classroom_id', $id)->pluck('name', 'id');
    }

    public function storeStudent($request) {
        DB::beginTransaction(); // start transaction
        try {
            $student = Student::create([
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
                $image->storeAs('attachments/students/' . $student->name, $name, 'upload_attachments');
                Image::create([
                    'filename' => 'attachments/students/' . $student->name . '/' . $name,
                    'imageable_id' => $student->id,
                    'imageable_type' => 'App\Models\Student',
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
        $student = Student::findOrFail($id);
        return view('pages.Students.show_student', compact('student'));
    }

    public function updateStudent($request, $id) {
        $student = Student::findOrFail($id)->update([
            'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
            'email' => $request->email,
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

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if($student) {
            toastr()->success(trans('messages.update'));
        } else {
            toastr()->error(trans('messages.error'));
        }
        return redirect()->route('students.index');
    }

    public function deleteStudent($id) {
        $student = Student::findOrFail($id);
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
        $student = Student::whereIn('id', $ids)->delete();

        if ($student) {
            toastr()->success(trans('messages.delete'));
        }
        return back();
    }

    public function uploadStudentAttachments($request, $id) {
        $student = Student::findOrFail($id);
        // Storage photo
        if($request->hasFile('files')) {
            foreach($request->file('files') as $file) {
                $name = $file->getClientOriginalName();
                $file->storeAs('attachments/students/' . $student->name, $name, 'upload_attachments');
                Image::create([
                    'filename' => 'attachments/students/' . $student->name . '/' . $name,
                    'imageable_id' => $student->id,
                    'imageable_type' => 'App\Models\Student',
                ]);
            }
        }
        toastr()->success(trans('messages.upload'));
        return back();
    }

    public function deleteStudentAttachments($id) {
        $file = Image::findOrFail($id);

        if (Storage::disk('upload_attachments')->exists($file->filename)) {
            Storage::disk('upload_attachments')->delete($file->filename);
        }

        $file->delete();

        toastr()->success(trans('messages.delete'));
        return back();
    }

    // this function to make download for attachments for students
    public function downloadStudentAttachment($id) {
        $attachment = Image::findOrFail($id);
        // المسار اللي في الداتابيز
        $filePath = $attachment->filename;
        // تأكد إن الملف موجود
        if (!Storage::disk('upload_attachments')->exists($filePath)) {
            abort(404, 'File not found');
        }
        // تحميل الملف
        return Storage::disk('upload_attachments')->download( $filePath, basename($filePath) ); // Ø§Ø³Ù… Ø§Ù„Ù…Ù„Ù Ø¹Ù†Ø¯ Ø§Ù„ØªØ­Ù…ÙŠÙ„
    }

    // this is function to preview file for  attachments for students
    public function previewStudentAttachment($id) {
        $file = Image::findOrFail($id);

        $path = Storage::disk('upload_attachments')->path($file->filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

}