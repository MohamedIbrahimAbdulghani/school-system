<?php

namespace App\Http\Controllers\Classrooms;

use App\Models\ClassRooms;
use App\Models\grades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRoomRequest;
use App\Http\Requests\UpdateClassRoomRequest;

class ClassRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = ClassRooms::all();
        $grades = grades::all();
        return view('pages.Classrooms.classrooms', compact('classrooms', 'grades'));
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
    public function store(StoreClassRoomRequest $request)
    {
        try {
            $List_Classes = $request->List_Classes;
            foreach($List_Classes as $List_Class) {
                $classroom = ClassRooms::create([
                    'name_class' => ['ar' => $List_Class['class_name_ar'], 'en' => $List_Class['class_name_en']], // this is to enter 2 forma from name ( arabic + english )
                    'grade_id' => $List_Class['grade_id'],
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('classrooms.index');
        } catch(\Exception $exc) {
            return redirect()->back()->withErrors(['error' => $exc->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRooms $classRooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRooms $classRooms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassRoomRequest $request, $id)
    {
        $classroom = ClassRooms::findOrFail($id);

        try {
             $classroom->update([
            'name_class' => [
                'ar' => $request->class_name_ar,
                'en' => $request->class_name_en,
            ],
            'grade_id' => $request->grade_id,
        ]);
            toastr()->success(trans('messages.update'));
            return redirect()->route('classrooms.index');
        } catch(\Exception $exc) {
            return redirect()->back()->withErrors(['error' => $exc->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $classroom = ClassRooms::findOrFail($id);
        $classroom->delete();
        toastr()->success(trans('messages.delete'));
        return back();
    }
}