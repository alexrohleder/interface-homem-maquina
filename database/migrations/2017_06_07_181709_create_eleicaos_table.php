<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEleicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleicaos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->smallInteger('ano');
            $table->date('data');
            $table->tinyInteger('ativo');
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
        Schema::drop('eleicaos');
    }
}
