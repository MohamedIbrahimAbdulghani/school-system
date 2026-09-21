<?php

namespace App\Http\Controllers\Parent\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceResearchRequest;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Degree;
use Illuminate\Support\Facades\DB;

class SonController extends Controller
{
    public function index()
    {
        $sons = Student::where('parent_id', auth('parent')->user()->id)->get();
        return view('pages.Parents.sons.index', compact('sons'));
    }

    public function result($id)
    {
        $son = Student::findOrFail($id);
        if($son->parent_id == auth('parent')->user()->id){
            $degrees = Degree::where('student_id', $id)->get();
            if($degrees->isNotEmpty()) {
                return view('pages.Parents.degrees.index', compact('degrees'));
            } else {
                toastr()->error(trans('parent.no_result'));
                return redirect()->route('sons.index');
            }
        }
        else{
            toastr()->error(trans('parent.no_result'));
            return redirect()->route('sons.index');
        }
    }

    public function attendances() {
        $students = Student::where('parent_id', auth('parent')->user()->id)->get();
        return view('pages.Parents.attendance.index', compact('students'));
    }

    public function search(AttendanceResearchRequest $request)
    {
        $students = Student::where('parent_id',  auth('parent')->user()->id)->get();

        if ($request->student_id == 0) {
            $studentIds = $students->pluck('id');
            $Students = Attendance::whereBetween('attendance_date', [ $request->start_date, $request->end_date])
            ->whereIn('student_id', $studentIds)
            ->get();
        } else {
            $student = $students ->where('id', $request->student_id)
            ->first();

            if (!$student) {
                toastr()->error(trans('parent.no_result'));
                return redirect()->route('sons.attendances');
            }

            $Students = Attendance::whereBetween('attendance_date', [ $request->start_date, $request->end_date ])
            ->where('student_id', $request->student_id)
            ->get();
        }

        return view( 'pages.Parents.attendance.index', compact('Students', 'students') );
    }


}