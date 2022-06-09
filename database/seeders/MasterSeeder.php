<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('masters')->insert([
            'name' => 'APP_LOGO',
            'value' => 'https://placeholder.com/wp-content/uploads/2018/10/placeholder.com-logo1.png',
            'desc' => 'Logo Aplikasi',
            'content_type_id' => 2

        ]);

        DB::table('masters')->insert([
            'name' => 'APP_SPLASH_SCREEN',
            'value' => 'https://placeholder.com/wp-content/uploads/2018/10/placeholder.com-logo1.png',
            'desc' => 'Splash Screen Aplikasi',
            'content_type_id' => 2

        ]);

        DB::table('masters')->insert([
            'name' => 'APP_TAG_LINE',
            'value' => 'https://placeholder.com/wp-content/uploads/2018/10/placeholder.com-logo1.png',
            'desc' => 'Tagline Aplikasi',
            'content_type_id' => 1
        ]);

        DB::table('masters')->insert([
            'name' => 'APP_HEADER',
            'value' => 'https://placeholder.com/wp-content/uploads/2018/10/placeholder.com-logo1.png',
            'desc' => 'Header  Aplikasi',
            'content_type_id' => 2

        ]);

        DB::table('masters')->insert([
            'name' => 'APP_VIDEO',
            'value' => 'https://www.youtube.com/watch?v=9uwEAugeH8w',
            'desc' => 'Video Pengenalan  Aplikasi',
            'content_type_id' => 3

        ]);
    }
}
