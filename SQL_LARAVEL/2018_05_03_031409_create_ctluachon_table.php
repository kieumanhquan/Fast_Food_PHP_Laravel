<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtluachonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietluachon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tuychon_id')->unsigned()->nullable();
            $table->foreign('tuychon_id')->references('id')->on('tuychon')->onDelete('cascade');
            $table->integer('luachon_id')->unsigned();
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
        Schema::dropIfExists('chitietluachon');
    }
}
