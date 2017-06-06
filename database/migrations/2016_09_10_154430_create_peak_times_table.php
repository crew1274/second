<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeakTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peak_times', function (Blueprint $table) {
            $table->increments('id');
            $table->time('start')->comment('開始時間');
            $table->time('end')->comment('結束時間');
            $table->string('day')->comment('時間');
            $table->string('state')->comment('狀態');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peak_times');
    }
}
