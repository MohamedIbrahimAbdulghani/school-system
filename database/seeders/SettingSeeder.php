<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->delete();

        $settings = [
            ['key' => 'current_year', 'value' => '2026-2027'],
            ['key' => 'school_title', 'value' => 'SS'],
            ['key' => 'school_name', 'value' => 'School System'],
            ['key' => 'end_first_term', 'value' => '01-12-2026'],
            ['key' => 'end_second_term', 'value' => '01-05-2027'],
            ['key' => 'phone', 'value' => '01205481045'],
            ['key' => 'address', 'value' => 'Sharqia Governorate - Egypt'],
            ['key' => 'email', 'value' => 'mohamedibrahimabdulghani@gmail.com'],
            ['key' => 'logo', 'value' => 'logo.png'],
        ];

        foreach($settings as $setting) {
            Setting::create($setting);
        }
    }
}
