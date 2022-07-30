<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConteudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conteudos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            /* caso a conta do usuário seja apagada, consequentemente todos os seus conteudos são apagados */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('titulo');
            $table->longText('texto');
            $table->string('imagem');
            $table->string('link');
            $table->dateTime('data');
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
        Schema::dropIfExists('conteudos');
    }
}
