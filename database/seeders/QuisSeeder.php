<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Quis::factory(5)->has(\App\Models\Question::factory()->has(\App\Models\Option::factory()->count(4))->count(5))->create();
    }
}
