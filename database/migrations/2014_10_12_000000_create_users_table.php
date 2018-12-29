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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('phone')->nullable();
            $table->text('photo')->nullable();
            $table->string('password');
            $table->text('address');
            $table->text('pet')->nullable();//untuk dokter
            $table->text('facility')->nullable();//untuk dokter
            $table->string('favorite_pet')->nullable();//untuk pembeli
            $table->text('deskripsi')->nullable();;//untuk penjual
            $table->string('api_token');
            $table->enum('role',array('admin','pembeli','penjual','dokter'))->default('pembeli');
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
