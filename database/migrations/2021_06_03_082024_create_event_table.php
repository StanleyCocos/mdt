<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 64)->nullable()->comment('事件名');
            $table->string('client', 64)->nullable()->comment('平台');
            $table->string('imei', 64)->nullable()->comment('设备标识');
            $table->string('version', 8)->nullable()->comment('版本号');
            $table->boolean('state')->comment('firebase 规则校验');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
