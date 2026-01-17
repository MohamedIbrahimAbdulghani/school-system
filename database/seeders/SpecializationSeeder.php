<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Specializations;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations')->delete();

        $specializations = [
            ['en' => 'Arabic', 'ar' => 'عربي'],
            ['en' => 'English', 'ar' => 'أنجليزي'],
            ['en' => 'Math', 'ar' => 'رياضيات'],
            ['en' => 'Science', 'ar' => 'علوم'],
            ['en' => 'History', 'ar' => 'تاريخ'],
        ];
        foreach($specializations as $specialization) {
            Specializations::create(['name' => $specialization]);
        }
    }
}
