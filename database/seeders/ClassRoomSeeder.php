<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classrooms')->delete();

        $classrooms = [
            ['en' => 'First Classroom', 'ar' => 'الفصل الاول'],
            ['en' => 'Second Classroom', 'ar' => 'الفصل الثاني'],
            ['en' => 'Third Classroom', 'ar' => 'الفصل الثالث'],
        ];
        foreach($classrooms as $class_room) {
            Classroom::create([
                'name_class' => $class_room,
                'grade_id' => Grade::all()->unique()->random()->id,
            ]);
        }
    }
}
