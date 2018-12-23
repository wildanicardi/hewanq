<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->foreign('id_user')->references('id ')->on('users');
            $table->string('name');
            $table->string('jenis_barang');
            $table->text('photo')->nullable();;
            $table->integer('stock');
            $table->integer('price');
            $table->decimal('size', 8, 2)->nullable();//untuk items
            $table->string('ukuran')->nullable();// untuk items
            $table->string('jenis_hewan')->nullable();// untuk hewan
            $table->string('gender')->nullable();//untuk hewan
            $table->date('tgl_lahir')->nullable();//untuk hewan
            $table->text('riwayat_kesehatan')->nullable();//untuk hewan
            $table->enum('jenis',array('pet','item'))->default('item');
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
        Schema::dropIfExists('barangs');
    }
}
