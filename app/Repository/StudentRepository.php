<?php

namespace App\Repository;


use App\Models\Genders;
use App\Models\Grades;
use App\Models\MyParents;
use App\Models\Nationalitie;
use App\Models\Students;
use App\Models\TypeBloods;

class StudentRepository implements StudentRepositoryInterface {
    public function getStudents() {
        return Students::all();
    }
    public function getGenders() {
        return Genders::all();
    }
    public function getGrades() {
        return Grades::all();
    }
    public function getParents() {
        return MyParents::all();
    }
    public function getNationalities() {
        return Nationalitie::all();
    }
    public function getType_Bloods() {
        return TypeBloods::all();
    }
}
