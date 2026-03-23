<?php


namespace App\Repository;

interface StudentRepositoryInterface {
    public function getStudents();
    public function getGenders();
    public function getGrades();
    public function getParents();
    public function getNationalities();
    public function getType_Bloods();
}