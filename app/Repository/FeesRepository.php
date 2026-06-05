<?php


namespace App\Repository;

use App\Models\Fees;
use App\Models\Grades;

class FeesRepository implements FeesRepositoryInterface {
    // this function to get all data from fees and show index page
    public function index() {
        $fees = Fees::all();
        return view('pages.Fees.index', compact('fees'));
    }
    // this function to get all data from grades and show create page
    public function create() {
        $Grades = Grades::all();
        return view('pages.Fees.add', compact('Grades'));
    }
    // this function to store data to database and show message success or error
    public function store($request) {
        $fee = Fees::create([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'amount' => $request->amount,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'section_id' => $request->section_id,
            'year' => $request->year,
            'notes' => $request->notes,
        ]);
        if ($fee) {
            toastr()->success(trans('messages.success'));
        } else {
            toastr()->error(trans('messages.error'));
        }
        return redirect()->route('fees.index');
    }
    // this function to show fee data by id
    public function show($id) {
        return $id;
    }
    // this function to show edit page by id
    public function edit($id) {
        $Grades = Grades::all();
        $fee = Fees::findOrFail($id);
        return view('pages.Fees.edit', compact('fee', 'Grades'));
    }
    // this function to update data in database and show message success or error
    public function update($request) {
        $fee = Fees::findOrFail($request->id);
        $fee->update([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'amount' => $request->amount,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'section_id' => $request->section_id,
            'year' => $request->year,
            'notes' => $request->notes,
        ]);
        if ($fee) {
            toastr()->success(trans('messages.update'));
        } else {
            toastr()->error(trans('messages.error'));
        }
        return redirect()->route('fees.index');
    }
    // this function to delete data from database and show message success or error
    public function destroy($id) {
        $fee = Fees::findOrFail($id);
        $fee->delete();
        if ($fee) {
            toastr()->success(trans('messages.delete'));
        } else {
            toastr()->error(trans('messages.delete'));
        }
        return redirect()->route('fees.index');
    }
}