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
        $teachers = Teachers::all();
        $specializations = Specializations::all();
        $genders = Genders::all();
        return view('pages.Teachers.index', compact('teachers', 'specializations', 'genders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = Specializations::all();
        $genders = Genders::all();
        return view('pages.Teachers.add_teacher', compact('specializations', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher = Teachers::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => ['ar' => $request->teacher_name_ar, 'en' => $request->teacher_name_en],
            'specialization_id' => $request->specialization_id,
            'gender_id' => $request->gender_id,
            'join_date' => $request->join_date,
            'address' => $request->address,
        ]);
        if ($teacher) {
            toastr()->success(trans('messages.success'));
        } else {
            toastr()->error(trans('messages.error'));
        }
            return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teachers::find($id);
        return view('pages.Teachers.show', compact('teacher'));
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
    public function update(Request $request, string $id)
    {
        $teacher = Teachers::find($id)->update([
            'name' => ['ar' => $request->teacher_name_ar, 'en' => $request->teacher_name_en],
            'specialization_id' => $request->specialization,
            'gender_id' => $request->gender,
            'join_date' => $request->join_date,
            'address' => $request->address,
        ]);
        if($teacher) {
            toastr()->success(trans('messages.update'));
        } else {
            toastr()->error(trans('messages.error'));        
        }
        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teachers::find($id)->delete();
        if($teacher) {
            toastr()->success(trans('messages.delete'));
        } else {
            toastr()->error(trans('messages.error'));
        }
        return redirect()->route('teachers.index');
    }
}
