<?php


namespace App\Repository;

interface StudentRepositoryInterface {
    public function getStudents();
    public function getStudentById($id);
    public function getGenders();
    public function getGrades();
    public function getParents();
    public function getNationalities();
    public function getType_Bloods();
    public function getClassrooms($id);
    public function getSections($id);
    public function storeStudent($request);
    public function showStudent($id);
    public function updateStudent($request, $id);
    public function deleteStudent($id);
    public function deleteAllStudents($ids);
    public function uploadStudentAttachments($request, $id);
    public function deleteStudentAttachments($id);
}
