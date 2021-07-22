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
            'type' => 'text',
            'desc' => 'paragraf'
        ]);
        
        DB::table('content_types')->insert([
            'type' => 'image',
            'desc' => 'image berbentuk jpg/png'
        ]);

        DB::table('content_types')->insert([
            'type' => 'link',
            'desc' => 'link atau url'
        ]);
        DB::table('content_types')->insert([
            'type' => 'doc',
            'desc' => 'file document dan sejenisnya'
        ]);
    }
}
