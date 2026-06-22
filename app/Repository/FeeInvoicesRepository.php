<?php

namespace App\Repository;

use App\Models\FeeInvoices;
use App\Models\Fees;
use App\Models\Students;
use Exception;
use Illuminate\Support\Facades\DB;

class FeeInvoicesRepository implements FeeInvoicesInterface {
    public function index() {
        // TODO: implement index() method
    }

    public function show($id) {
        $student = Students::findOrFail($id);
        $fees = Fees::where('classroom_id', $student->classroom_id)->get();
        return view('pages.Students.FeeInvoices.add', compact('student', 'fees'));
    }

    public function store($request) {
        // $list_fees = $request->list_fees;
        // DB::beginTransaction();
        // try {
        //     foreach($list_fees as $list_fee) {
        //         $fee = FeeInvoices::create([
        //             $fee->invoice_date = date('YYYY-MM-DD'),
        //             $fee->student_id = $request->student_id,
        //             $fee->grade_id = $request->grade_id,
        //             $fee->classroom_id = $request->classroom_id,
        //             $fee->fee_id = $request->fee_id,
        //             $fee->amount = $request->amount,
        //             $fee->description = $request->description,
        //         ]);
        //     }
        //     DB::commit();
        //     toastr()->success(trans('messages.success'));
        //     return redirect()->route('fee_invoices.index.show');
        // } catch(Exception $exp) {
        //     DB::rollback();
        //     return redirect()->back()->withErrors(['error' => $exp->getMessage()]);
        // }
        return $request;
    }
}