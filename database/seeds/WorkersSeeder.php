<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class WorkersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workers')->insert([
            'name' => Str::random(10),
            'profession_id' => Str::rand(1, 4),
            'age' => Str::rand(18, 100)
        ]);
    }
}
