<?php

namespace App\Repository;

use App\Models\Fees;
use App\Models\Students;

class FeeInvoicesRepository implements FeeInvoicesInterface {
    public function index() {
        // TODO: implement index() method
    }

    public function show($id) {
        $student = Students::findOrFail($id);
        $fees = Fees::where('classroom_id', $student->classroom_id)->get();
        return view('pages.Students.FeeInvoices.add', compact('student', 'fees'));
    }
}
