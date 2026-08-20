<?php

namespace App\Repository;

use App\Models\Exams;

class ExamsRepository implements ExamsRepositoryInterface
{
    public function index()
    {
        $exams = Exams::all();
        return view('pages.Exams.index', compact('exams'));
    }

    public function create()
    {
        return view('pages.Exams.create');
    }

    public function store($request)
    {
        try {
            Exams::create([
            'name' => ['ar' => $request->exam_name_ar, 'en' => $request->exam_name_en],
            'term' => $request->term,
            'academic_year' => $request->academic_year,
        ]);
        toastr()->success(trans('messages.success'));
        return redirect()->route('exams.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        // Implementation for displaying a specific exam
    }

    public function edit($id)
    {
        $exam = Exams::findOrFail($id);
        return view('pages.Exams.edit', compact('exam'));
    }

    public function update($request)
    {
        try {
            $exam = Exams::findOrFail($request->id);
            $exam->update([
                'name' => ['ar' => $request->exam_name_ar, 'en' => $request->exam_name_en],
                'term' => $request->term,
                'academic_year' => $request->academic_year,
            ]);
            toastr()->success(trans('messages.update'));
            return redirect()->route('exams.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $exam = Exams::findOrFail($id);
            $exam->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('exams.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
