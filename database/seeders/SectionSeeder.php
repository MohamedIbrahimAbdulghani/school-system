<?php

namespace Database\Seeders;

use App\Models\ClassRooms;
use App\Models\Grades;
use App\Models\Sections;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->delete();

        $sections = [
            ['en' => 'a', 'ar' => 'أ'],
            ['en' => 'b', 'ar' => 'ب'],
            ['en' => 'c', 'ar' => 'ت'],
        ];
        foreach($sections as $section) {
            Sections::create([
                'name' => $section,
                'status' => 1,
                'grade_id' => Grades::all()->unique()->random()->id,
                'classroom_id' => ClassRooms::all()->unique()->random()->id,
            ]);
        }
    }
}