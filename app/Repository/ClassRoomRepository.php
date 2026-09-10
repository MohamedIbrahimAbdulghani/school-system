<?php


namespace App\Repository;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Repository\ClassRoomRepositoryInterface;
use App\Models\Grade;


class ClassRoomRepository implements ClassRoomRepositoryInterface {
    public function index() {
        $classrooms = Classroom::all();
        $grades = Grade::all();
        return view('pages.Classrooms.classrooms', compact('classrooms', 'grades'));
    }
    public function store($request) {
        try {
            $List_Classes = $request->List_Classes;
            foreach($List_Classes as $List_Class) {
                $classroom = Classroom::create([
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
    public function update($request, $id) {
        $classroom = Classroom::findOrFail($id);

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
    public function destroy($request, $id) {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();
        toastr()->success(trans('messages.delete'));
        return back();
    }
    public function bulkDestroy($request) {
        // ids جايه كسلسلة مفصولة بفاصلة
        $ids = explode(',', $request->ids);

        // حذف كل الصفوف اللي الـ IDs بتاعتها موجودة
        Classroom::whereIn('id', $ids)->delete();

        toastr()->success(trans('messages.delete'));
        return back();
    }
}