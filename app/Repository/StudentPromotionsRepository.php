<?php


namespace App\Repository;

use App\Models\Grades;
use App\Models\promotion;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentPromotionsRepository implements StudentPromotionsRepositoryInterface {
    public function index() {
        $Grades = Grades::all();
        return view('pages.Students.Promotions.index',compact('Grades'));
    }

    // this function to promote students from one grade to another grade
    public function store($request) {

        DB::beginTransaction(); // Start a transaction ( it will allow us to roll back the changes if something goes wrong )

        try {
            $students = Students::where('grade_id', $request->grade_id)
            ->where('classroom_id', $request->classroom_id)
            ->where('section_id', $request->section_id)
            ->where('academic_year', $request->academic_year)
            ->get();

            if ($students->count() < 1) {
                return redirect()->back()->with('error_promotions', trans('student.no_students_found'));
            }

            foreach($students as $student) {
                // update students
                Students::whereIn('id', $students->pluck('id'))->update([
                    'grade_id' => $request->grade_id_new,
                    'classroom_id' => $request->classroom_id_new,
                    'section_id' => $request->section_id_new,
                    'academic_year' => $request->new_academic_year
                ]);
                // create promotion
                promotion::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade' => $request->grade_id,
                    'from_classroom' => $request->classroom_id,
                    'from_section' => $request->section_id,
                    'to_grade' => $request->grade_id_new,
                    'to_classroom' => $request->classroom_id_new,
                    'to_section' => $request->section_id_new,
                    'academic_year' => $request->academic_year,
                    'new_academic_year' => $request->new_academic_year
                ]);
            }

            DB::commit(); // Commit the transaction ( if everything is ok, it will save the changes to the database )
            toastr()->success(trans('messages.update'));
            return redirect()->route('promotions.index');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_promotions', trans('messages.error'));
        }
    }

    public function create() {
        $promotions = promotion::all();
        return view('pages.Students.Promotions.promotions_manage',compact('promotions'));
    }
    public function destroy($request) {

        DB::beginTransaction(); // Start a transaction ( it will allow us to roll back the changes if something goes wrong )

        try {
            if($request->page_id == 1) {
                // rollback promotion for all students
                $promotions = promotion::all();
                foreach($promotions as $promotion) {
                    // update students
                    Students::whereIn('id', $promotion->pluck('id'))->update([
                        'grade_id' => $request->grade_id_new,
                        'classroom_id' => $request->classroom_id_new,
                        'section_id' => $request->section_id_new,
                        'academic_year' => $request->new_academic_year
                    ]);
                    // Delete promotions
                    promotion::truncate();
                    DB::commit(); // Commit the transaction ( if everything is ok, it will save the changes to the database )
                    toastr()->success(trans('messages.success'));
                    return redirect()->route('promotions.index');
                }
            } else {
                echo "go from delete on student";
            }
        }  catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_promotions', trans('messages.error'));
        }
    }

}
