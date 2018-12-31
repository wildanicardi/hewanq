<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->foreign('id_user')->references('id')->on('users');
            $table->string('name');
            $table->string('Hewan_dilayani');
            $table->string('kota');
            $table->text('alamat');
            $table->text('hari_buka');
            $table->time('jam_buka');
            $table->text('photo')->nullable();
            $table->text('deskripsi');
            $table->integer('harga');
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
        Schema::dropIfExists('service');
    }
}
