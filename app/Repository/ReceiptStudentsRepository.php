<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\ReceiptStudent;
use App\Models\StudentAccount;
use App\Models\FundAccount;


class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface {
    public function index() {
        $receipt_students = ReceiptStudent::all();
        return view('pages.Receipts.index', compact('receipt_students'));
    }
    public function show($id) {
        $student = Student::findOrFail($id);
        return view('pages.Receipts.add', compact('student'));
    }
    public function store($request) {
        DB::beginTransaction();
        try {
            // 1- to insert data in receipt_students table in database { Ø¬Ø¯ÙˆÙ„ Ø³Ù†Ø¯Ø§Øª Ø§Ù„Ù‚Ø¨Ø¶ }
            $receipt = ReceiptStudent::create([
                'date' => date('Y-m-d'),
                'student_id' => $request->student_id,
                'debit' => $request->debit,
                'description' => $request->description,
            ]);
            //2- to insert data in fund_accounts table in database { ( Ù…Ø¯ÙŠÙ† ) Ø¬Ø¯ÙˆÙ„ Ø§Ù„ØµÙ†Ø¯ÙˆÙ‚ }
            $fund_account = FundAccount::create([
                'date' => date('Y-m-d'),
                'receipt_id' => $receipt->id,
                'debit' => $request->debit,
                'credit' => 0.00,
                'description' => $request->description,
            ]);
            // 3- to insert data in students_accounts table in database { ( Ø¯Ø§Ø¦Ù† ) Ø¬Ø¯ÙˆÙ„ Ø­Ø³Ø§Ø¨Ø§Øª Ø§Ù„Ø·Ù„Ø§Ø¨ } 
            $student_account = StudentAccount::create([
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

    public function edit($id) {
        $receipt_student = ReceiptStudent::findOrFail($id);
        return view('pages.Receipts.edit', compact('receipt_student'));
    }

    public function update($request) {
        DB::beginTransaction();
        try {
            // 1- to update data in receipt_students table in database { Ø¬Ø¯ÙˆÙ„ Ø³Ù†Ø¯Ø§Øª Ø§Ù„Ù‚Ø¨Ø¶ }
            $receipt = ReceiptStudent::findOrFail($request->receipt_student_id)->update([
                'date' => date('Y-m-d'),
                'debit' => $request->debit,
                'description' => $request->description,
            ]);
            //2- to update data in fund_accounts table in database { ( Ù…Ø¯ÙŠÙ† ) Ø¬Ø¯ÙˆÙ„ Ø§Ù„ØµÙ†Ø¯ÙˆÙ‚ }
            $fund_account = FundAccount::where('receipt_id', $request->receipt_student_id)->update([
                'date' => date('Y-m-d'),
                'debit' => $request->debit,
                'credit' => 0.00,
                'description' => $request->description,
            ]);
            // 3- to update data in students_accounts table in database { ( Ø¯Ø§Ø¦Ù† ) Ø¬Ø¯ÙˆÙ„ Ø­Ø³Ø§Ø¨Ø§Øª Ø§Ù„Ø·Ù„Ø§Ø¨ } 
            $student_account = StudentAccount::where('receipt_id', $request->receipt_student_id)->update([
                'date' => date('Y-m-d'),
                'type' => 'receipt',
                'debit' => 0.00,
                'credit' => $request->debit,
                'description' => $request->description,
            ]);
            DB::commit();
            toastr()->success(trans('messages.update'));
            return redirect()->route('receipt_students.index');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error(trans('messages.error'));
            return redirect()->back();
        }
    }

    public function destroy($request) {
        ReceiptStudent::destroy($request->id);
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

}

