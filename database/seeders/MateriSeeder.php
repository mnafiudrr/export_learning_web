<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subSubMateriFactories = \App\Models\SubSubMateri::factory()->count(1)->has(\App\Models\SubSubMateriContent::factory()->count(2));
        $subMateriFactories = \App\Models\SubMateri::factory()->count(5)->has(\App\Models\SubMateriContent::factory()->count(3))->has($subSubMateriFactories);
        \App\Models\Materi::factory(35)->has(\App\Models\MateriContent::factory()->count(3))
        ->has($subMateriFactories)->create();
    }
}
