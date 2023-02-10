<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animals')->insert([
            'name'=>'Воробей',
            'kinds_id'=>1
        ]);
        DB::table('animals')->insert([
            'name'=>'Голубь',
            'kinds_id'=>1
        ]);
        DB::table('animals')->insert([
            'name'=>'Скворец',
            'kinds_id'=>1
        ]);
        DB::table('animals')->insert([
            'name'=>'Карась',
            'kinds_id'=>2
        ]);
        DB::table('animals')->insert([
            'name'=>'Щука',
            'kinds_id'=>2
        ]);
        DB::table('animals')->insert([
            'name'=>'Окунь',
            'kinds_id'=>2
        ]);
        DB::table('animals')->insert([
            'name'=>'Волк',
            'kinds_id'=>3
        ]);
        DB::table('animals')->insert([
            'name'=>'Медведь',
            'kinds_id'=>3
        ]);
        DB::table('animals')->insert([
            'name'=>'Заяц',
            'kinds_id'=>3
        ]);
    }
}
