<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Section;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function get_classrooms($id) {
        return Classroom::where("grade_id", $id)->pluck("name_class", "id");
    }

    public function get_sections($id) {
        return Section::where("classroom_id", $id)->pluck("name", "id");
    }
}
