<?php


namespace App\Repository;

use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentPromotionsRepository implements StudentPromotionsRepositoryInterface {
    public function index() {
        $promotions = Promotion::all();
        return view('pages.Students.Promotions.promotions_manage',compact('promotions'));
    }

    // this function to promote students from one grade to another grade
    public function store($request) {

        DB::beginTransaction(); // Start a transaction ( it will allow us to roll back the changes if something goes wrong )

        try {
            $students = Student::where('grade_id', $request->grade_id)
            ->where('classroom_id', $request->classroom_id)
            ->where('section_id', $request->section_id)
            ->where('academic_year', $request->academic_year)
            ->get();

            if ($students->count() < 1) {
                return redirect()->back()->with('error_promotions', trans('student.no_students_found'));
            }

            foreach($students as $student) {
                // update students
                Student::whereIn('id', $students->pluck('id'))->update([
                    'grade_id' => $request->grade_id_new,
                    'classroom_id' => $request->classroom_id_new,
                    'section_id' => $request->section_id_new,
                    'academic_year' => $request->new_academic_year
                ]);
                // create promotion
                Promotion::updateOrCreate([
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
        $Grades = Grade::all();
        return view('pages.Students.Promotions.add_promotions',compact('Grades'));
    }

    public function destroy($request) {

        DB::beginTransaction(); // Start a transaction ( it will allow us to roll back the changes if something goes wrong )

        try {
            if($request->page_id == 1) {
                // rollback promotion for all students
                $promotions = Promotion::all();
                foreach($promotions as $promotion) {
                    // update students
                    $ids  = explode(',', $promotion->student_id);
                    Student::whereIn('id', $ids)->update([
                        'grade_id' => $promotion->from_grade,
                        'classroom_id' => $promotion->from_classroom,
                        'section_id' => $promotion->from_section,
                        'academic_year' => $promotion->academic_year
                    ]);
                    // Delete promotions
                    Promotion::truncate();
                }
                    DB::commit(); // Commit the transaction ( if everything is ok, it will save the changes to the database )
                    toastr()->success(trans('messages.success'));
                    return redirect()->route('promotions.index');
            } else {
                $promotion = Promotion::findOrFail($request->id);
                // update students
                Student::where('id', $promotion->student_id)->update([
                    'grade_id' => $promotion->from_grade,
                    'classroom_id' => $promotion->from_classroom,
                    'section_id' => $promotion->from_section,
                    'academic_year' => $promotion->academic_year
                ]);
                // Delete promotion
                Promotion::destroy($request->id);
                DB::commit(); // Commit the transaction ( if everything is ok, it will save the changes to the database )
                toastr()->success(trans('messages.success'));
                return redirect()->back();
            }
        }  catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_promotions', trans('messages.error'));
        }
    }

}


