<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demand_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value')->comment('最大需量');
            $table->integer('value_max')->comment('需量高限');
            $table->integer('value_min')->comment('需量低限');
            $table->integer('load_off_gap')->comment('卸載間格時間');
            $table->integer('reload_delay')->comment('復歸延遲時間');
            $table->integer('reload_gap')->comment('復歸間格時間');
            $table->integer('cycle')->comment('計算週期');
            $table->string('mode')->comment('卸載模式');
            $table->string('group')->comment('卸載群種類');
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
        Schema::dropIfExists('demand_settings');
    }
}
