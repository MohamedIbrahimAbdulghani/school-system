<?php

namespace App\Http\Controllers\Teacher\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Section;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectionIds = DB::table('teacher_section')->where('teacher_id', auth('teacher')->user()->id)->pluck('section_id');
        $student = Student::whereIn('section_id', $sectionIds)->get();
        return view('pages.Teachers.dashboard.students.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function section() {
        $sectionIds = DB::table('teacher_section')->where('teacher_id', auth('teacher')->user()->id)->pluck('section_id');
        $sections = Section::whereIn('id', $sectionIds)->get();
        return view('pages.Teachers.dashboard.sections.index', compact('sections'));
    }
    public function attendance(Request $request) {
        try {
            foreach($request->attendances as $student_id => $attendance) {
                if($attendance === 'presence') {
                    $attendance_status = true;
                } else if($attendance === 'absence') {
                    $attendance_status = false;
                }
                Attendance::updateorCreate([
                    'student_id' => $student_id
                ],[
                'student_id' =>$student_id,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'teacher_id' => auth('teacher')->user()->id,
                'attendance_date' => date('Y-m-d'),
                'attendance_status' => $attendance_status,
            ]);
            }
            toastr()->success(trans('messages.update'));
            return redirect()->route('attendances.show');
        } catch(Exception $exp) {
            return redirect()->back()->withErrors(['error' => $exp->getMessage()]);
        }
    }
}
