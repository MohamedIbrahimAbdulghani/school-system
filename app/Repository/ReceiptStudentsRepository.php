<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;
use App\Models\Students;
use App\Models\ReceiptStudent;
use App\Models\StudentAccounts;
use App\Models\FundAccounts;


class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface {
    public function index() {
        $receipt_students = ReceiptStudent::all();
        return view('pages.Receipts.index', compact('receipt_students'));
    }
    public function show($id) {
        $student = Students::findOrFail($id);
        return view('pages.Receipts.add', compact('student'));
    }
    public function store($request) {
        DB::beginTransaction();
        try {
            // 1- to insert data in receipt_students table in database { جدول سندات القبض }
            $receipt = ReceiptStudent::create([
                'date' => date('Y-m-d'),
                'student_id' => $request->student_id,
                'debit' => $request->debit,
                'description' => $request->description,
            ]);
            //2- to insert data in fund_accounts table in database { ( مدين ) جدول الصندوق }
            $fund_account = FundAccounts::create([
                'date' => date('Y-m-d'),
                'receipt_id' => $receipt->id,
                'debit' => $request->debit,
                'credit' => 0.00,
                'description' => $request->description,
            ]);
            // 3- to insert data in students_accounts table in database { ( دائن ) جدول حسابات الطلاب } 
            $student_account = StudentAccounts::create([
                'date' => date('Y-m-d'),
                'type' => 'receipt',
                'student_id' => $request->student_id,
                'receipt_id' => $receipt->id,
                'debit' => 0.00,
                'credit' => $request->debit,
                'description' => $request->description,
            ]);
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('receipt_students.index');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error(trans('messages.error'));
            return redirect()->back();
        }
    }
}