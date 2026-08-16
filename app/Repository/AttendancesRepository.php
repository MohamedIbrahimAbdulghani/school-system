<?php

namespace App\Repository;
use App\Models\Grades;
use App\Models\Students;

class AttendancesRepository implements AttendancesInterface
{
    public function index()
    {
        // $grades = Grades::with(['sections'])->get();
        $grades = Grades::with([
            'sections' => function ($query) {
                $query->whereHas('students'); // هات الـ Section لو عنده Students مرتبطين بيه
            }
        ])->get();
        return view('pages.Attendances.index', compact('grades'));
    }

    public function create()
    {
        //
    }

    public function store($request)
    {
        //
    }

    public function show($id)
    {
        $students = Students::where('section_id', $id)->get();
        return view('pages.Attendances.show', compact('students'));
    }

    public function edit($id)
    {
        //
    }

    public function update($request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
