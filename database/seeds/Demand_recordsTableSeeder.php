<?php

use Illuminate\Database\Seeder;

class Demand_recordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('demand_records')->insert([
           'value' => '15',
           'circuit' => '1',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
            ]);
    }
}
