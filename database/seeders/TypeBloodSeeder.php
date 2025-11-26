<?php

namespace Database\Seeders;

use App\Models\TypeBloods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeBloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // this is to insert type of blood inside database
        DB::table('type_bloods')->delete();
        $type_bloods = ['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];
        foreach($type_bloods as $type_blood) {
            TypeBloods::create(['name' => $type_blood]);
        }
    }
}