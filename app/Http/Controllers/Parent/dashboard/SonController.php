<?php

namespace App\Http\Controllers\Parent\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Degree;

class SonController extends Controller
{
    public function index()
    {
        $sons = Student::where('parent_id', auth('parent')->user()->id)->get();
        return view('pages.Parents.sons.index', compact('sons'));
    }

    public function result($id)
    {
        $son = Student::findOrFail($id);
        if($son->parent_id == auth('parent')->user()->id){
            $degrees = Degree::where('student_id', $id)->get();
            if($degrees->isNotEmpty()) {
                return view('pages.Parents.degrees.index', compact('degrees'));
            } else {
                toastr()->error(trans('parent.no_result'));
                return redirect()->route('sons.index');
            }
        }
        else{
            toastr()->error(trans('parent.no_result'));
            return redirect()->route('sons.index');
        }
    }

    
}
