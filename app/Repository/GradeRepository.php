<?php


namespace App\Repository;

use App\Models\Grade;
use App\Repository\GradeRepositoryInterface;

class GradeRepository implements GradeRepositoryInterface {
    public function index() {
        $grades = Grade::all();
        return view('pages/Grades/grades', compact('grades'));
    }
    public function store($request) {
        try {
            $validated = $request->validated();
            $grades = Grade::create([
                'name' => ['ar' => $request->name, 'en' => $request->name_en], // this is to enter 2 forma from name ( arabic + english )
                'notes' => $request->notes,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('grades.index');

        } catch(\Exception $exc) {
            return redirect()->back()->withErrors(['error' => $exc->getMessage()]);
        }
    }
    public function update($request, $id) {
        try {
        $validated = $request->validated();

        $grades = Grade::findOrFail($id);
        $grades->update([
            'name' => ['ar' => $request->name, 'en' => $request->name_en], // this is to enter 2 forma from name ( arabic + english )
            'notes' => $request->notes,
        ]);
        toastr()->success(trans('messages.update'));
        return redirect()->route('grades.index');
        } catch(\Exception $exc) {
            return redirect()->back()->withErrors(['error' => $exc->getMessage()]);
        }
    }
    public function destroy($request, $id) {
    // 1- this is first way to get classrooms by grades and delete grades if this grades don't related by classrooms
            /*
                $classroom = Classroom::where('grade_id', $request->id)->pluck('grade_id');
                if($classroom->count() > 0)  { // classrooms have items or classrooms related by grades
                    toastr()->error(trans('grades.delete_grade_error'));
                } else {
                    $grade = Grade::findOrFail($id);
                    $grade->delete();
                    toastr()->success(trans('messages.delete'));
                }
                return redirect()->route('grades.index');
            */

    // 2- this is second way to get classrooms by grades and delete grades if this grades don't related by classrooms
        $grade = Grade::with("sections")->findOrFail($request->id);
        if($grade->sections->count() > 0) {
            toastr()->error(trans('grades.delete_grade_error'));
        } else {
            $grade->delete();
            toastr()->success(trans('messages.delete'));
        }
        return redirect()->route('grades.index');
    }
}
