<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
           'address' => '台南市大學路東區1號',
           
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
            ]);
    }
}
