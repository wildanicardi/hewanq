<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id_pet');
            $table->string('name');
            $table->integer('price');
            $table->string('jenis_hewan');
            $table->string('gender');
            $table->dateTime('tgl_lahir');
            $table->text('akta_hewan');
            $table->text('riwayat_kesehatan');
            $table->text('photo');
            $table->text('description');
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
        Schema::dropIfExists('pet');
    }
}
