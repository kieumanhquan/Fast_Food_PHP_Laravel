<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietkhohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietkho', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soluong');
            $table->decimal('gianhap', 18, 0);
            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
            $table->integer('khohang_id')->unsigned();
            $table->foreign('khohang_id')->references('id')->on('khohang')->onDelete('cascade');
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
        Schema::dropIfExists('chitietkho');
    }
}
