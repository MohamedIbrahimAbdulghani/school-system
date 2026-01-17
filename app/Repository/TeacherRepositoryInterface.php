<?php


namespace App\Repository;
use Illuminate\Http\Request;

interface TeacherRepositoryInterface {
    public function getAllTeachers();
    public function getTeacherById($id);
    public function getAllSpecializations();
    public function getAllGenders();
    public function storeTeacher($request);
}
