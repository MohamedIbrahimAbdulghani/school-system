<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->delete();

        $grades = [
            ['en' => 'Primary Stage', 'ar' => 'المرحلة الابتدائية'],
            ['en' => 'Middle School', 'ar' => 'المرحلة الاعدادية'],
            ['en' => 'High School', 'ar' => 'المرحلة الثانوية'],
        ];
        foreach($grades as $grade) {
            Grade::create([
                'name' => $grade,
                'notes' => fake()->sentence(),
            ]);
        }
    }
}
