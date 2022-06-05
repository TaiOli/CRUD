<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cpf');
            $table->string('email');
            $table->string('perfil');
            $table->string('endereco');
            $table->timestamps();
        });  
        
        Schema::create('endereco',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('endereco_id');
            $table->string('outros_enderecos');
            $table->timestamps();
            $table->foreign('endereco_id')
                    ->references('id')
                    ->on('form')
                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form');
    }
};
