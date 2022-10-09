<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThucdonMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tensp')->unique();
            $table->integer('soluong');
            $table->decimal('giaold', 18, 0);
            $table->decimal('gianew', 18, 0);
            $table->string('mota');
            $table->integer('danhmuc_id')->unsigned();
            $table->foreign('danhmuc_id')->references('id')->on('danhmuc')->onDelete('cascade');
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
        Schema::dropIfExists('menu');
    }
}
