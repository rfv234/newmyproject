<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithoutEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        try {
            $this->call(WorkersSeeder::class);
            $this->call(ProfessionSeeder::class);
            //$this->call(UsersSeeder::class);
            $this->call(QuisSeeder::class);
            $this->call(QuisAnswersSeeder::class);
            $this->call(QuisQuestionsSeeder::class);
            $this->call(ResultSeeder::class);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}
