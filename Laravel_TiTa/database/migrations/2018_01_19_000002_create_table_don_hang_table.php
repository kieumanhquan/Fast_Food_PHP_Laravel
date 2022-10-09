<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDonHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
/*         Schema::create('chitietdathang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('donhang')->onDelete('cascade');
            $table->integer('soluong');
            $table->decimal('tongtien', 18, 0);
            $table->timestamps();
        }); */
        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tinhtrang');
            $table->integer('pp_thanhtoan');
            $table->decimal('tongtien', 18, 0);
            $table->string('ghichu');
            $table->integer('diachikh_id')->unsigned()->nullable();
            $table->foreign('diachikh_id')->references('id')->on('diachikhachhang')->onDelete('cascade');
            $table->integer('nhanvien_id')->unsigned()->nullable();
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
        Schema::dropIfExists('donhang');
    }
}
