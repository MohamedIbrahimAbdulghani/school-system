<?php

namespace Database\Seeders;

use App\Models\MyParents;
use App\Models\Nationalitie;
use App\Models\Religions;
use App\Models\TypeBloods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('my_parents')->delete();
        $my_parents = new MyParents();
        $my_parents->email = 'samir.gamal77@yahoo.com';
        $my_parents->password = Hash::make('123');
        $my_parents->father_name = ['en' => 'ibrahim', 'ar' => 'ابراهيم  '];
        $my_parents->father_national_id = '1234567810';
        $my_parents->father_passport_id = '1234567810';
        $my_parents->father_phone = '1234567810';
        $my_parents->father_job = ['en' => 'Accounter', 'ar' => 'محاسب'];
        $my_parents->father_nationality_id  = Nationalitie::all()->unique()->random()->id;
        $my_parents->father_blood_type_id  =TypeBloods::all()->unique()->random()->id;
        $my_parents->father_religion_id  = Religions::all()->unique()->random()->id;
        $my_parents->father_address ='القاهرة';
        $my_parents->mother_name = ['en' => 'Amira', 'ar' => 'اميرة'];
        $my_parents->mother_national_id = '1234567810';
        $my_parents->mother_passport_id = '1234567810';
        $my_parents->mother_phone = '1234567810';
        $my_parents->mother_job = ['en' => 'Teacher', 'ar' => 'معلمة'];
        $my_parents->mother_nationality_id  = Nationalitie::all()->unique()->random()->id;
        $my_parents->mother_blood_type_id  =TypeBloods::all()->unique()->random()->id;
        $my_parents->mother_religion_id  = Religions::all()->unique()->random()->id;
        $my_parents->mother_address ='القاهرة';
        $my_parents->save();
    }
}