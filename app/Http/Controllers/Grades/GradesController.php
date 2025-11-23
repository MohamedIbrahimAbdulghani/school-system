<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grades;
use App\Models\ClassRooms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grades::all();
        return view('pages/Grades/grades', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradeRequest $request)
    {
        try {
            $validated = $request->validated();
            $grades = Grades::create([
                'name' => ['ar' => $request->name, 'en' => $request->name_en], // this is to enter 2 forma from name ( arabic + english )
                'notes' => $request->notes,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('grades.index');

        } catch(\Exception $exc) {
            return redirect()->back()->withErrors(['error' => $exc->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(grades $grades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(grades $grades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreGradeRequest $request, $id)
    {
        try {
        $validated = $request->validated();

        $grades = Grades::findOrFail($id);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
    // 1- this is first way to get classrooms by grades and delete grades if this grades don't related by classrooms
            /*
                $classroom = ClassRooms::where('grade_id', $request->id)->pluck('grade_id');
                if($classroom->count() > 0)  { // classrooms have items or classrooms related by grades
                    toastr()->error(trans('grades.delete_grade_error'));
                } else {
                    $grade = grades::findOrFail($id);
                    $grade->delete();
                    toastr()->success(trans('messages.delete'));
                }
                return redirect()->route('grades.index');
            */

    // 2- this is second way to get classrooms by grades and delete grades if this grades don't related by classrooms
        $grade = Grades::with("classRooms")->findOrFail($request->id);
        if($grade->classRooms->count() > 0) {
            toastr()->error(trans('grades.delete_grade_error'));
        } else {
            $grade->delete();
            toastr()->success(trans('messages.delete'));
        }
        return redirect()->route('grades.index');

    }
}
