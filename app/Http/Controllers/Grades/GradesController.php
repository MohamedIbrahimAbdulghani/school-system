<?php

namespace App\Http\Controllers\Grades;

use App\Models\grades;
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
        $grades = grades::all();
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
        // check if grade name is found in database or not
        if(grades::where('name->ar', $request->name)->orWhere('name->en', $request->name_en)->exists()) {
            return redirect()->back()->withErrors(trans('grades.exists'));
        }

        try {

            $validated = $request->validated();

            /****************************************    This is type for translation in database ******************************** */
                // $translations = [
                //     'ar' => $request->name,
                //     'en' => $request->name_en
                // ];
                // grades->setTranslations('name', $translations);
            /****************************************    This is type for translation in database ******************************** */

            $grades = grades::create([
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

        $grades = grades::findOrFail($id);
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
        $grades = grades::findOrFail($id);
        $grades->delete();
        toastr()->success(trans('messages.delete'));
        return redirect()->route('grades.index');
    }
}
