<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->insert([
           'domain' => 'http://example.com',
           'ip' => '127.0.0.2',
           'path' => 'api/post/',
           'port' => '80',
           'key' => 'dae',
            ]);
    }
}
