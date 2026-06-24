<?php

namespace App\Repository;

use App\Models\FeeInvoices;
use App\Models\Fees;
use App\Models\Grades;
use App\Models\Students;
use App\Models\StudentsAccount;
use Exception;
use Illuminate\Support\Facades\DB;

class FeeInvoicesRepository implements FeeInvoicesInterface {
    public function index() {
        $fee_invoices = FeeInvoices::all();
        $grades = Grades::all();
        return view('pages.Students.FeeInvoices.index', compact('fee_invoices', 'grades'));
    }

    public function show($id) {
        $student = Students::findOrFail($id);
        $fees = Fees::where('classroom_id', $student->classroom_id)->get();
        return view('pages.Students.FeeInvoices.add', compact('student', 'fees'));
    }

    public function store($request) {
        $list_fees = $request->list_fees;
        DB::beginTransaction();
        try {
            foreach($list_fees as $list_fee) {
                // 1- save or insert data in fee_invoices table in database
                $fee_invoice = FeeInvoices::create([
                    'invoice_date' => date('Y-m-d'),
                    'student_id' => $list_fee['student_id'],
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'fee_id' => $list_fee['fee_id'],
                    'amount' => $list_fee['amount'],
                    'description' => $list_fee['description'],
                ]);

                // 2- save or insert data in students_account table in database
                StudentsAccount::create([
                    'date' => date('Y-m-d'),
                    'student_id' => $list_fee['student_id'],
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'type' => 'invoice',
                    'fee_invoice_id' => $fee_invoice->id,
                    'debit' => $list_fee['amount'],
                    'credit' => 0.00,
                    'description' => $list_fee['description'],
                ]);
            }
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('fee_invoices.index');
        } catch(Exception $exp) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $exp->getMessage()]);
        }
    }

    public function edit($id) {
        $fee_invoice = FeeInvoices::findOrFail($id);
        $fees = Fees::where('classroom_id', $fee_invoice->classroom_id)->get();
        return view('pages.Students.FeeInvoices.edit', compact('fee_invoice', 'fees'));
    }

    public function update($request) {
        DB::beginTransaction();
        try {
            $fee_invoice = FeeInvoices::findOrFail($request->id);
            // 1- update data from fee_invoices table in database
                $fee_invoice->update([
                    'fee_id' => $request->fee_id,
                    'amount' => $request->amount,
                    'description' => $request->description,
                ]);
           // 2- update data from students_account table in database
            $students_account = StudentsAccount::where('fee_invoice_id', $request->id)->first();
                $students_account->update([
                    'debit' => $request->amount,
                    'description' => $request->description,
                ]);

                DB::commit();
                toastr()->success(trans('messages.update'));
                return redirect()->route('fee_invoices.index');
        } catch(Exception $exp) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $exp->getMessage()]);
        }

    }

    public function destroy($id) {
        $fee_invoice = FeeInvoices::findOrFail($id);
        $fee_invoice->delete();
        toastr()->success(trans('messages.delete'));
        return redirect()->back();
    }
}
