<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('carts', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned()->index();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->integer('file_id')->unsigned()->index();
          $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
          $table->integer('harga_barang');
          $table->integer('jumlah_barang');
          $table->rememberToken();
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
        Schema::dropIfExists('carts');
    }
}
