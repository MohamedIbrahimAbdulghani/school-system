<?php

namespace App\Http\Controllers\Parent\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceResearchRequest;
use App\Http\Requests\ProfileParentRequest;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Degree;
use App\Models\Fee;
use App\Models\FeeInvoice;
use App\Models\MyParent;
use App\Models\ReceiptStudent;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function fees() {
        $students_ids = Student::where('parent_id', auth('parent')->user()->id)->pluck('id');
        $fee_invoices = FeeInvoice::whereIn('student_id', $students_ids)
        ->with(['student', 'fee', 'grade', 'classroom'])
        ->orderBy('student_id')
        ->orderBy('id')
        ->get()
        ->unique('student_id');


        $debit = StudentAccount::whereIn('student_id', $students_ids)
        ->selectRaw('student_id, SUM(debit) as debit')
        ->groupBy('student_id')
        ->pluck('debit', 'student_id');

        $balance = StudentAccount::whereIn('student_id', $students_ids)
            ->selectRaw('
                student_id,
                SUM(debit) as debit,
                SUM(credit) as credit,
                SUM(debit) - SUM(credit) as balance
            ')
            ->groupBy('student_id')
            ->get()
            ->keyBy('student_id');
        return view('pages.Parents.fees.index', compact('students_ids', 'fee_invoices', 'debit', 'balance'));
    }

    public function receipt($id) {
        $student = Student::find($id);
        if (!$student || $student->parent_id != auth('parent')->user()->id) {
            toastr()->error(trans('parent.error_id'));
            return redirect()->route('sons.fees');
        }
        $receipt_students = ReceiptStudent::where('student_id', $id)->get();
        if($receipt_students->isEmpty()) {
            toastr()->error(trans('fees.no_receipt'));
            return redirect()->route('sons.fees');
        }
        return view('pages.Parents.receipt.index', compact('receipt_students'));
    }
    public function profile() {
        $profile = MyParent::findOrFail(auth('parent')->user()->id);
        return view('pages.Parents.profile', compact('profile'));
    }

    public function update(ProfileParentRequest $request, $id) {
        try {
            $profile = MyParent::findOrFail($id);
            if(!empty($request->password)) {
                $profile->update([
                    'father_name' => ['en' => $request->father_name_en, 'ar' => $request->father_name],
                    'password' => Hash::make($request->password),
                ]);
            } else {
                $profile->update([
                    'father_name' => ['en' => $request->father_name_en, 'ar' => $request->father_name],
                ]);
            }
            toastr()->success(trans('messages.update'));
            return redirect()->route('parent.profile');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}