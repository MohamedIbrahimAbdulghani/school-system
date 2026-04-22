<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Models\Grades;
use App\Models\ClassRooms;
use App\Models\Sections;
use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSectionRequest;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $grades = Grades::with('sections')->get();
        $grades = Grades::all();
        $teachers = Teachers::all();
        return view('pages.Sections.section', compact('grades', 'teachers'));
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
    public function store(StoreSectionRequest $request)
    {
        try {
            $validated = $request->validated();
            $section = Sections::create([
                'name' => ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En], // this is to enter 2 forma from name ( arabic + english )
                'status' => 1,
                'grade_id' => $request->Grade_id,
                'classroom_id' => $request->Class_id,
            ]);
            $section->teachers()->attach($request->teachers_id); // attach() is a function to take teacher_id and section_id and insert this value in table teacher_section
            toastr()->success(trans('messages.success'));
            return redirect()->route('sections.index');

        } catch(\Exception $exc) {
            return redirect()->back()->withErrors(['error' => $exc->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSectionRequest $request, string $id)
    {
        try {
            $validated = $request->validated();

            $section = Sections::findOrFail($id);

            if(isset($request->status)) {
                $section->status = 1;
            } else {
                $section->status = 2;
            }

            $section->update([
                'name' => ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En], // this is to enter 2 forma from name ( arabic + english )
                'grade_id' => $request->Grade_id ?? $section->grade_id,
                'classroom_id' => $request->Class_id ?? $section->classroom_id,
            ]);
            $section->teachers()->sync($request->teachers_id); // sync() is a function to update teacher_id and section_id  in table teacher_section
            toastr()->success(trans('messages.update'));
            return redirect()->route('sections.index');

            } catch(\Exception $exc) {
                return redirect()->back()->withErrors(['error' => $exc->getMessage()]);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $section = Sections::findOrFail($id);
        $section->delete();
        toastr()->success(trans('messages.delete'));
        return redirect()->route('sections.index');
    }
    public function getClasses($id) {
        $listClassrooms = ClassRooms::where('grade_id', $id)->pluck('name_class', 'id');
        return $listClassrooms;
    }
}
