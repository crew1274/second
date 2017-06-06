<?php

use Illuminate\Database\Seeder;

class OffloadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offloads')->insert([
           'group1' => 1,
           'group2' => 1,
           'group3' => 1,
           'group4' => 1,
           'total' => 4,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
            ]);
    }
}
