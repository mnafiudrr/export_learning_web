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
            'desc'  => 'Logo Aplikasi'
        ]);
    }
}
