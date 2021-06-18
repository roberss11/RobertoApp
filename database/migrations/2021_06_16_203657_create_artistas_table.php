<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artistas', function (Blueprint $table) {
            $table->id();

            $table->String('Nombre');
            $table->String('Apellido');
            $table->integer('Edad');
            $table->String('Nacionalidad');
            $table->String('Tipo');
            $table->String('GeneroMusical');
            $table->String('Foto');

            $table->unsignedBigInteger('banda_id');
            $table->foreign('banda_id')->references('id')->on('bandas');

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
        Schema::dropIfExists('artistas');
    }
}
