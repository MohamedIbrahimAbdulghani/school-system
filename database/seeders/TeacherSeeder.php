<?php

namespace Database\Seeders;

use App\Models\Genders;
use App\Models\Specializations;
use App\Models\Teachers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->delete();

        $teacher = new Teachers();
        $teacher->name = ['ar' => ' علي', 'en' => 'Ali '];
        $teacher->email = 'ali.teacher@gmail.com';
        $teacher->password = Hash::make('123');
        $teacher->gender_id = Genders::all()->unique()->random()->id;
        $teacher->specialization_id = Specializations::all()->unique()->random()->id;
        $teacher->join_date = date('2021-01-01');
        $teacher->address = 'القاهرة';
        $teacher->save();
    }
}