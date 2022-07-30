<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amigos', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            /* caso a conta do usuário seja apagada, consequentemente todos amizades são apagados */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('amigo_id')->unsigned();
            /* caso a conta do usuário seja apagada, consequentemente todos os seus amigos são apagados */
            $table->foreign('amigo_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amigos');
    }
}
