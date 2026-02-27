<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specializations;
use App\Models\Genders;
use App\Models\Teachers;
use Illuminate\Support\Facades\Hash;
use App\Repository\TeacherRepositoryInterface;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeachersController extends Controller
{
    protected $teacher;

    public function __construct(TeacherRepositoryInterface $teacher) {
        $this->teacher = $teacher;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $teachers = Teachers::all();
        // $specializations = Specializations::all();
        // $genders = Genders::all();
        $teachers =  $this->teacher->getTeachers();
        $specializations = $this->teacher->getSpecializations();
        $genders = $this->teacher->getGenders();
        return view('pages.Teachers.index', compact('teachers', 'specializations', 'genders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = $this->teacher->getSpecializations();
        $genders = $this->teacher->getGenders();
        return view('pages.Teachers.add_teacher', compact('specializations', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        return $this->teacher->storeTeacher($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teachers =  $this->teacher->editTeacher($id);
        $specializations = $this->teacher->getSpecializations();
        $genders = $this->teacher->getGenders();
        return view('pages.Teachers.edit', compact('teachers', 'specializations', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, string $id)
    {
        // return $request;
        return $this->teacher->updateTeacher($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->teacher->deleteTeacher($id);
    }

    // this is function to delete all teachers
    public function bulkDestroy(Request $request) {
        // ids جايه كسلسلة مفصولة بفاصلة
        $ids = explode(',', $request->ids);

        // حذف كل الصفوف اللي الـ IDs بتاعتها موجودة
        Teachers::whereIn('id', $ids)->delete();

        toastr()->success(trans('messages.delete'));
        return back();
    }

}
