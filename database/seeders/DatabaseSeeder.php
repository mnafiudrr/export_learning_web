<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DummyUserSeeder::class);
        $this->call(ContentTypeSeeder::class);
        $this->call(MasterSeeder::class);
        $this->call(MateriSeeder::class);
        $this->call(QuisSeeder::class);

        \App\Models\Event::factory(40)->create();
    }
}
