<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdathang', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('menu_id')->unsigned();
          $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
          $table->integer('order_id')->unsigned();
          $table->foreign('order_id')->references('id')->on('donhang')->onDelete('cascade');
          $table->integer('soluong');
          $table->decimal('tongtien', 18, 0);
          $table->integer('luachon_id')->unsigned()->nullable();
          $table->foreign('luachon_id')->references('id')->on('luachon')->onDelete('cascade');
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
        Schema::dropIfExists('chitietdathang');
    }
}
