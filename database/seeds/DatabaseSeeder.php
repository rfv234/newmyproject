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
            $this->call(UserSeeder::class);
            $this->call(ProfessionSeeder::class);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}
