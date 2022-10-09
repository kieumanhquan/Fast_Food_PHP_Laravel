<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhoHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khohang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sanphamkho');
            $table->integer('soluong');
            $table->decimal('giasanpham', 18, 0);
            $table->decimal('tongtienkho', 18, 0);
            $table->integer('nhanvien_id')->unsigned();
            $table->foreign('nhanvien_id')->references('id')->on('nhanviens')->onDelete('cascade');
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
        Schema::dropIfExists('khohang');
    }
}
