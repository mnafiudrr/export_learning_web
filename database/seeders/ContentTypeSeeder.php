<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('content_types')->insert([
            'type' => 'paragraf',
            'desc' => 'paragraf lorem ipsum'
        ]);
    }
}
