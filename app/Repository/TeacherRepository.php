<?php

namespace App\Repository;
use App\Models\Teachers;
use App\Models\Specializations;
use App\Models\Genders;


class TeacherRepository implements TeacherRepositoryInterface {
    public function getAllTeachers() {
        return Teachers::all();
    }
    public function getTeacherById($id) {
        return Teachers::where('id', $id)->get();
    }
    public function getAllSpecializations() {
        return Specializations::all();
    }
    public function getAllGenders() {
        return Genders::all();
    }
    public function storeTeacher($request) {

    }
}
