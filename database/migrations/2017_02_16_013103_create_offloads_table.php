<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offloads', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('group1')->default(0)->comment('群組1');
            $table->boolean('group2')->default(0)->comment('群組2');
            $table->boolean('group3')->default(0)->comment('群組3');
            $table->boolean('group4')->default(0)->comment('群組4');
            $table->boolean('group5')->default(0)->comment('群組5');
            $table->boolean('group6')->default(0)->comment('群組6');
            $table->boolean('group7')->default(0)->comment('群組7');
            $table->boolean('group8')->default(0)->comment('群組8');
            $table->boolean('group9')->default(0)->comment('群組9');
            $table->boolean('group10')->default(0)->comment('群組10');
            $table->boolean('group11')->default(0)->comment('群組11');
            $table->boolean('group12')->default(0)->comment('群組12');
            $table->integer('total')->nullable()->comment('修改總數');
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
        Schema::dropIfExists('offloads');
    }
}
