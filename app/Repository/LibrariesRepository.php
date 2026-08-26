<?php

namespace App\Repository;

use App\Models\Grades;
use App\Models\Library;

class LibrariesRepository implements LibrariesRepositoryInterface {
    public function index() {
        $libraries = Library::all();
        return view('pages.Libraries.index', compact('libraries'));
    }

    public function create() {
        $grades = Grades::all();
        return view('pages.Libraries.create', compact('grades'));
    }

    public function show($id) {

    }

    public function store($request) {
        try {
            $file = $request->file('file_name');
            $name = $file->getClientOriginalName();

            $library = Library::create([
                'title' => $request->title,
                'file_name' => $name,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'teacher_id' => '1'
            ]);
            // if library created in database upload file
            $file->storeAs('attachments/libraries/' . $library->title, $name, 'upload_attachments');
            toastr()->success(trans('messages.success'));
            return redirect()->route('libraries.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id) {

    }

    public function update($request) {

    }

    public function destroy($id) {

    }

    public function download() {

    }
}