<?php

namespace App\Repository;

use App\Models\Grades;
use App\Models\Subjects;
use App\Models\Teachers;

class SubjectRepository implements SubjectRepositoryInterface
{
    public function index()
    {
        $subjects = Subjects::all();
        return view('pages.Subjects.index', compact('subjects'));
    }

    public function create()
    {
        $grades = Grades::all();
        $teachers = Teachers::all();
        return view('pages.Subjects.create', compact('grades', 'teachers'));
    }
    public function store($request)
    {

    }

    public function edit($id)
    {

    }
    public function update($request)
    {

    }
    public function destroy($request)
    {

    }
}
