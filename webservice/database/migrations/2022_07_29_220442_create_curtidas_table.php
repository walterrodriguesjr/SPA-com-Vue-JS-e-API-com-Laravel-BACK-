<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurtidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curtidas', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            /* caso a conta do usuário seja apagada, consequentemente tudo que curtiu são apagados */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('conteudo_id')->unsigned();
            /* caso o conteudo seja apagada, consequentemente todos as curitidas são apagados */
            $table->foreign('conteudo_id')->references('id')->on('conteudos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curtidas');
    }
}
