<?php

namespace App\Repository;
use App\Models\Grades;
use App\Models\Students;

class AttendancesRepository implements AttendancesInterface
{
    public function index()
    {
        $grades = Grades::all();
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
        // return view('pages.Attendances.show', compact('students'));
        return $students;
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
