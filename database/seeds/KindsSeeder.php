<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KindsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kinds')->insert([
            'name'=>'Птицы'
        ]);
        DB::table('kinds')->insert([
            'name'=>'Рыбы'
        ]);
        DB::table('kinds')->insert([
            'name'=>'Звери'
        ]);
    }
}
