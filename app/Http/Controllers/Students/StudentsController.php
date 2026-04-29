<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\ClassRooms;
use App\Models\Image;
use App\Models\Sections;
use App\Models\Students;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;


class StudentsController extends Controller
{
    protected $student;

    public function __construct(StudentRepositoryInterface $student)
    {
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->student->getStudents();
        return view('pages.Students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Nationalities = $this->student->getNationalities();
        $Type_Bloods = $this->student->getType_Bloods();
        $Genders = $this->student->getGenders();
        $Grades = $this->student->getGrades();
        $Parents = $this->student->getParents();
        return view('pages.Students.add_student', compact('Nationalities', 'Type_Bloods', 'Genders', 'Grades', 'Parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        return $this->student->storeStudent($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->student->showStudent($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = $this->student->getStudentById($id);
        $Nationalities = $this->student->getNationalities();
        $Type_Bloods = $this->student->getType_Bloods();
        $Genders = $this->student->getGenders();
        $Grades = $this->student->getGrades();
        $Parents = $this->student->getParents();
        return view('pages.Students.edit_student', compact('student', 'Nationalities', 'Type_Bloods', 'Genders', 'Grades', 'Parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, string $id)
    {
        return $this->student->updateStudent($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->student->deleteStudent($id);
    }

    public function getClassrooms($id)
    {
        return $this->student->getClassrooms($id);
    }

    public function getSections($id)
    {
        return $this->student->getSections($id);
    }
    // this is function to delete all students
    public function deleteAllStudents(Request $request) {
        return $this->student->deleteAllStudents($request->ids);
    }
    // this is function to upload photo for student or to upload attachments for students
    public function uploadStudentAttachments(Request $request, $id) {
        return $this->student->uploadStudentAttachments($request, $id);
    }
    // this is function to delete photo for  attachments for students
    public function deleteStudentAttachments($id) {
        return $this->student->deleteStudentAttachments($id);
    }
}
