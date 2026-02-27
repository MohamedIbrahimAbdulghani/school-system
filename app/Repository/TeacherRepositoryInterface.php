<?php


namespace App\Repository;
use Illuminate\Http\Request;

interface TeacherRepositoryInterface {
    public function getTeachers();
    public function getTeacherById($id);
    public function getSpecializations();
    public function getGenders();
    public function storeTeacher($request);
    public function editTeacher($id);
    public function updateTeacher($request, $id);
    public function deleteTeacher($id);
}
