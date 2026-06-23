<?php

namespace Database\Seeders;

use App\Models\ClassRooms;
use App\Models\Grades;
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
        DB::table('class_rooms')->delete();

        $class_rooms = [
            ['en' => 'First Classroom', 'ar' => 'الفصل الاول'],
            ['en' => 'Second Classroom', 'ar' => 'الفصل الثاني'],
            ['en' => 'Third Classroom', 'ar' => 'الفصل الثالث'],
        ];
        foreach($class_rooms as $class_room) {
            ClassRooms::create([
                'name_class' => $class_room,
                'grade_id' => Grades::all()->unique()->random()->id,
            ]);
        }
    }
}
