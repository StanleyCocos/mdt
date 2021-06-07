<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_history', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('header')->nullable()->comment("请求头部");
            $table->text('params')->nullable()->comment("请求参数");
            $table->string('url')->nullable()->comment('请求url');
            $table->string('client', 64)->nullable()->comment('平台');
            $table->string('imei', 64)->nullable()->comment('设备标识');
            $table->string('version', 8)->nullable()->comment('版本号');
            $table->text('result')->nullable()->comment('请求结果');
            $table->string('code', 8)->nullable()->comment('请求状态');
            $table->string('method', 8)->nullable()->comment('请求方式');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_history');
    }
}
