<?php

use Illuminate\Database\Seeder;

class CodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('codes')->insert([
           'model' => 'PM100',
           'code' => '4,0',
           'created_at' => date("Y-m-d H:i:s"),
           'updated_at' => date("Y-m-d H:i:s"),
       ]);

       DB::table('codes')->insert([
          'model' => 'PM200-A',
          'code' => '4,1',
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('codes')->insert([
         'model' => 'PM200-B',
         'code' => '4,2',
         'created_at' => date("Y-m-d H:i:s"),
         'updated_at' => date("Y-m-d H:i:s"),
     ]);

     DB::table('codes')->insert([
        'model' => 'PM200-C',
        'code' => '4,3',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
       'model' => 'PM200-STD',
       'code' => '4,4',
       'created_at' => date("Y-m-d H:i:s"),
       'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-4-A',
      'code' => '4,5',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-4-B',
      'code' => '4,6',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-4-C',
      'code' => '4,7',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-4-STD',
      'code' => '4,8',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-A',
      'code' => '4,9',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-B',
      'code' => '4,10',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-C',
      'code' => '4,11',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-P-A',
      'code' => '4,12',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-P-B',
      'code' => '4,13',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-P-C',
      'code' => '4,14',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-P-STD',
      'code' => '4,15',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-STD',
      'code' => '4,16',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-X-A',
      'code' => '4,17',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-X-B',
      'code' => '4,18',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-X-C',
      'code' => '4,19',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM210-X-STD',
      'code' => '4,20',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM250-4-A',
      'code' => '4,21',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM250-4-B',
      'code' => '4,22',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM250-4-C',
      'code' => '4,23',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM250-4-STD',
      'code' => '4,24',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => "PM250-4-專案",
      'code' => '4,25',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM250-S-A',
      'code' => '4,26',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM250-S-B',
      'code' => '4,27',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM250-S-C',
      'code' => '4,28',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM250-S-STD',
      'code' => '4,29',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => "PM250-S-專案",
      'code' => '4,30',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM250-X-A',
      'code' => '4,31',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM250-X-B',
      'code' => '4,32',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM250-X-C',
      'code' => '4,33',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'PM250-X-STD',
      'code' => '4,34',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => "PM250-X-專案",
      'code' => '4,35',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => "保留",
      'code' => '4,36',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => "保留",
      'code' => '4,37',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => "保留",
      'code' => '4,38',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-120-A',
      'code' => '4,39',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-120-B',
      'code' => '4,40',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-120-C',
      'code' => '4,41',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-240-A',
      'code' => '4,42',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-240-B',
      'code' => '4,43',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-240-C',
      'code' => '4,44',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-P103',
      'code' => '4,45',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-P153',
      'code' => '4,46',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-P202',
      'code' => '4,47',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-P204',
      'code' => '4,48',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-P205',
      'code' => '4,49',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-P206',
      'code' => '4,50',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);

    DB::table('codes')->insert([
      'model' => 'Polaris-P252',
      'code' => '4,51',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => 'Polaris-P254',
      'code' => '4,52',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => 'Polaris-P255',
      'code' => '4,53',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => 'Polaris-P256',
      'code' => '4,54',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => 'Polaris-P302',
      'code' => '4,55',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => 'Polaris-P304',
      'code' => '4,56',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => 'Polaris-P305',
      'code' => '4,57',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => 'Polaris-P306',
      'code' => '4,58',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => 'SMB350-4-A',
      'code' => '4,59',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => 'SMB350-4-B',
      'code' => '4,60',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => 'SMB350-4-C',
      'code' => '4,61',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => 'SMB350-8-A',
      'code' => '4,62',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => 'SMB350-8-B',
      'code' => '4,63',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => "SMB350-8-C",
      'code' => '4,64',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => "SMB350-8-S",
      'code' => "4,65",
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
    DB::table('codes')->insert([
      'model' => "SMB350-8-專案型",
      'code' => '4,66',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
}
}
