<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->foreign('role_id')->references('id ')->on('role');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('jenis_kelamin')->nullable();
            $table->string('phone')->nullable();
            $table->text('photo')->nullable();
            $table->string('password');
            $table->string('kota')->nullable();
            $table->text('alamat')->nullable();
            $table->text('hewan_dilayani')->nullable();//untuk dokter
            $table->text('fasilitas')->nullable();//untuk dokter
            $table->string('favorite_pet')->nullable();//untuk pembeli
            $table->text('deskripsi')->nullable();;//untuk penjual
            $table->string('api_token');
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
        Schema::dropIfExists('users');
    }
}
