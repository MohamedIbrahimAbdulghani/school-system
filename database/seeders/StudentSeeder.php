<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use App\Models\TypeBlood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->delete();
        $students = new Student();
        $students->name = ['ar' => 'محمد ابراهيم', 'en' => 'Mohamed Ibrahim'];
        $students->email = 'mohamedibrahim@gmail.com';
        $students->password = Hash::make('123');
        $students->gender_id = 1;
        $students->nationality_id = Nationality::all()->unique()->random()->id;
        $students->blood_type_id =TypeBlood::all()->unique()->random()->id;
        $students->birth_date = date('2000-04-18');
        $students->grade_id = Grade::all()->unique()->random()->id;
        $students->classroom_id =Classroom::all()->unique()->random()->id;
        $students->section_id = Section::all()->unique()->random()->id;
        $students->parent_id = MyParent::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();
    }
}