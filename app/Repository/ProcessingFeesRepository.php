<?php

namespace App\Repository;
use App\Models\Students;
use App\Models\ProcessingFees;
use App\Models\StudentAccounts;
use Illuminate\Support\Facades\DB;


class ProcessingFeesRepository implements ProcessingFeesRepositoryInterface {
    public function index() {
        $processing_fees = ProcessingFees::all();
        return view('pages.ProcessingFees.index', compact('processing_fees'));
    }
    public function store($request) {
        DB::beginTransaction();
        try {
            // Save Data in processing_fees table
            $processing_fees = ProcessingFees::create([
                'date' => date('Y-m-d'),
                'student_id' => $request->student_id,
                'amount' => $request->debit,
                'description' => $request->description,
            ]);
            // Save Data in student_accounts table
            $student_accounts = StudentAccounts::create([
                'date' => date('Y-m-d'),
                'type' => 'processing_fee',
                'student_id' => $request->student_id,
                'processing_fee_id' => $processing_fees->id,
                'debit' => 0.00,
                'credit' => $request->debit,
                'description' => $request->description,
            ]);
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('processing_fees.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
    public function show($id) {
        $student = Students::findOrFail($id);
        return view('pages.ProcessingFees.add', compact('student'));
    }
    public function edit($id) {
        $processing_fee = ProcessingFees::findOrFail($id);
        return view('pages.ProcessingFees.edit', compact('processing_fee'));
    }
    public function update($request) {
        DB::beginTransaction();
        try {
            // Update Data in processing_fees table
            $processing_fee = ProcessingFees::findOrFail($request->processing_fee_id);
            $processing_fee->update([
                'amount' => $request->debit,
                'description' => $request->description,
            ]);
            // Update Data in student_accounts table
            $student_accounts = StudentAccounts::where('processing_fee_id', $request->processing_fee_id)->first();
            $student_accounts->update([
                'credit' => $request->debit,
                'description' => $request->description,
            ]);
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('processing_fees.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function destroy($request) {
        $processing_fee = ProcessingFees::findOrFail($request->id);
        $processing_fee->delete();
        toastr()->success(trans('messages.success'));
        return redirect()->route('processing_fees.index');
    }
}