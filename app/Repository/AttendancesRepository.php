<?php

namespace App\Repository;

use App\Models\attendances;
use App\Models\Grades;
use App\Models\Students;
use Exception;

class AttendancesRepository implements AttendancesInterface
{
    public function index()
    {
        // $grades = Grades::with(['sections'])->get();
        $grades = Grades::with([
            'sections' => function ($query) {
                $query->whereHas('students'); // هات الـ Section لو عنده Students مرتبطين بيه
            }
        ])->get();
        return view('pages.Attendances.index', compact('grades'));
    }

    public function create()
    {
        //
    }

    public function store($request)
    {
        try {
            foreach($request->attendances as $student_id => $attendance) { // make loop about attendances and take  student_id and attendance
                if($attendance == 'presence') {
                    $attendance_status = true; // $attendance_status = 1
                } else {
                    $attendance_status = false; // $attendance_status = 0
                }
                attendances::create([
                    'student_id' => $student_id,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => 1,
                    'attendance_date' => date('Y-m-d'),
                    'attendance_status' => $attendance_status
                ]);
            }
        toastr()->success(trans('messages.success'));
            return redirect()->route('attendances.show');
        } catch(Exception $exp) {
            return redirect()->back()->withErrors(['error' => $exp->getMessage()]);
        }
    }

    public function show($id)
    {
        $students = Students::with('attendance')->where('section_id', $id)->get();
        return view('pages.Attendances.show', compact('students'));
    }

    public function edit($id)
    {
        //
    }

    public function update($request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
