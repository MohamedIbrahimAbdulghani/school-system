<?php

namespace App\Repository;
use App\Models\PaymentRefunds;
use App\Models\Students;
use Illuminate\Support\Facades\DB;
use App\Models\StudentAccounts;
use App\Models\FundAccounts;

class PaymentRefundsRepository implements PaymentRefundsInterface {
    public function index() {
        $paymentrefunds = PaymentRefunds::all();
        return view('pages.PaymentRefunds.index', compact('paymentrefunds'));
    }
    public function store($request) {
        DB::beginTransaction();
        try {
            //  Save in payment_refunds table in database
            $paymentrefund = PaymentRefunds::create([
                'date' => date('Y-m-d'),
                'student_id' => $request->student_id,
                'amount' => $request->amount,
                'description' => $request->description,
            ]);

            // Save in fund_accounts table in database
            $fund_accounts = FundAccounts::create([
                'date' => date('Y-m-d'),
                'payment_refunds_id' => $paymentrefund->id,
                'debit' => 0.00,
                'credit' => $request->amount,
                'description' => $request->description,
            ]);

            // Save in student_accounts table in database
            $students_accounts = StudentAccounts::create([
                'date' => date('Y-m-d'),
                'type' => 'payment',
                'student_id' => $request->student_id,
                'payment_refunds_id' => $paymentrefund->id, // it's very important
                'debit' => $request->amount,
                'credit' => 0.00,
                'description' => $request->description,
            ]);
            toastr()->success(trans('messages.success'));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error(trans('messages.error'));
        }
        
        return redirect()->route('payment_refunds.index');
    }
    public function show($id) {
        $student = Students::findOrFail($id);
        return view('pages.PaymentRefunds.add', compact('student'));
    }
    public function edit($id) {

    }
    public function update($request) {

    }
    public function destroy($request) {

    }
}
