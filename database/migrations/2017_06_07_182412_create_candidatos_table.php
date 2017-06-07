<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->string('nome');
            $table->integer('id_partido')->unsigned();
            $table->integer('id_cargo')->unsigned();
            $table->integer('id_eleicao')->unsigned();
            $table->foreign('id_partido')->references('id')->on('partido')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_cargo')->references('id')->on('cargo')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_eleicao')->references('id')->on('eleicao')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('candidatos');
    }
}
