<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name'=>'Новосибирск',
            'population'=>1500000,
            'country_id'=>1
        ]);
        DB::table('cities')->insert([
            'name'=>'Берлин',
            'population'=>4000000,
            'country_id'=>2
        ]);
        DB::table('cities')->insert([
            'name'=>'Москва',
            'population'=>12000000,
            'country_id'=>1
        ]);
        DB::table('cities')->insert([
            'name'=>'Мюнхен',
            'population'=>1500000,
            'country_id'=>2
        ]);
        DB::table('cities')->insert([
            'name'=>'Питер',
            'population'=>5000000,
            'country_id'=>1
        ]);
        DB::table('cities')->insert([
            'name'=>'Гамбург',
            'population'=>2000000,
            'country_id'=>2
        ]);
        DB::table('cities')->insert([
            'name'=>'Париж',
            'population'=>2100000,
            'country_id'=>3
        ]);
        DB::table('cities')->insert([
            'name'=>'Томск',
            'population'=>500000,
            'country_id'=>1
        ]);
        DB::table('cities')->insert([
            'name'=>'Екатеринбург',
            'population'=>1500000,
            'country_id'=>1
        ]);
        DB::table('cities')->insert([
            'name'=>'Марсель',
            'population'=>800000,
            'country_id'=>3
        ]);
        DB::table('cities')->insert([
            'name'=>'Лион',
            'population'=>500000,
            'country_id'=>3
        ]);
    }
}
