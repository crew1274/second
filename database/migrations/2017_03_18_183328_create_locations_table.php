<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address')->comment('所輸入地址');
            $table->float('lat')->comment('地址北緯度');
            $table->float('lng')->comment('地址東經度');
            $table->string('timeZoneId')->comment('包含時區之完整名稱的字串');
            $table->string('dstOffset')->comment('日光節約時間');
            $table->integer('rawOffset')->comment('指定位置與 UTC 之間的時間差異 (以秒數表示)。這將不會把日光節約時間納入考量');
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
        Schema::dropIfExists('locations');
    }
}
