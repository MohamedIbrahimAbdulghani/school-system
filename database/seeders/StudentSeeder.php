<?php

namespace Database\Seeders;

use App\Models\ClassRooms;
use App\Models\Grades;
use App\Models\MyParents;
use App\Models\Nationalitie;
use App\Models\Sections;
use App\Models\Students;
use App\Models\TypeBloods;
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
        $students = new Students();
        $students->name = ['ar' => 'محمد ابراهيم', 'en' => 'Mohamed Ibrahim'];
        $students->email = 'mohamedibrahim@gmail.com';
        $students->password = Hash::make('123');
        $students->gender_id = 1;
        $students->nationality_id = Nationalitie::all()->unique()->random()->id;
        $students->blood_type_id =TypeBloods::all()->unique()->random()->id;
        $students->birth_date = date('2000-04-18');
        $students->grade_id = Grades::all()->unique()->random()->id;
        $students->classroom_id =ClassRooms::all()->unique()->random()->id;
        $students->section_id = Sections::all()->unique()->random()->id;
        $students->parent_id = MyParents::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();
    }
}
