<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiachiKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diachikhachhang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hoten');
            $table->integer('sdt')->unique();
            $table->string('email');
            $table->string('diachi');
            $table->integer('maps_id')->unsigned();
            $table->foreign('maps_id')->references('id')->on('maps')->onDelete('cascade');
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
        Schema::dropIfExists('diachikhachhang');
    }
}
