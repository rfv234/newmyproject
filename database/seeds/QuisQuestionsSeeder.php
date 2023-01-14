<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class QuisQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quis_questions')->insert([
            'quis_id' => Str::rand(1, 20),
            'text' => Str::random(15)
        ]);
    }
}