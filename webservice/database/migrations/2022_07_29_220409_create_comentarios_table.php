<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            /* caso a conta do usuário seja apagada, consequentemente todos os seus comentarios são apagados */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('conteudo_id')->unsigned();
            /* caso a conteudo do usuário seja apagada, consequentemente todos os seus comentários são apagados */
            $table->foreign('conteudo_id')->references('id')->on('conteudo')->onDelete('cascade');
            $table->longText('texto');
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
        Schema::dropIfExists('comentarios');
    }
}
