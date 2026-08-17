<?php

namespace App\Repository;
use App\Models\PaymentRefunds;
use App\Models\Students;
use Illuminate\Support\Facades\DB;
use App\Models\StudentAccounts;
use App\Models\FundAccounts;

class PaymentRefundsRepository implements PaymentRefundsRepositoryInterface {
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
            DB::commit();
            toastr()->success(trans('messages.success'));
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
        $paymentrefund = PaymentRefunds::findOrFail($id);
        return view('pages.PaymentRefunds.edit', compact('paymentrefund'));
    }
    public function update($request) {
        DB::beginTransaction();
        try {
            $paymentrefund = PaymentRefunds::findOrFail($request->paymentrefund_id);
            $paymentrefund->update([
                'amount' => $request->amount,
                'description' => $request->description,
            ]);

            // Update in fund_accounts table in database
            $fund_accounts = FundAccounts::where('payment_refunds_id', $paymentrefund->id)->first();
            $fund_accounts->update([
                'credit' => $request->amount,
                'description' => $request->description,
            ]);

            // Update in student_accounts table in database
            $students_accounts = StudentAccounts::where('payment_refunds_id', $paymentrefund->id)->first();
            $students_accounts->update([
                'debit' => $request->amount,
                'description' => $request->description,
            ]);
            DB::commit();
            toastr()->success(trans('messages.Update'));
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error(trans('messages.error'));
        }
        return redirect()->route('payment_refunds.index');
    }
    public function destroy($request) {
        PaymentRefunds::destroy($request->id);
        toastr()->error(trans('messages.delete'));
        return redirect()->route('payment_refunds.index');
    }
}
