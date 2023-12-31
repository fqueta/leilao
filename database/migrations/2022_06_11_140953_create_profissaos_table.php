<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome','150')->nullable();
            $table->enum('ativo',['s','n']);
            $table->longText('obs')->nullable();
            $table->integer('autor')->nullable();
            $table->string('token','60')->nullable();
            $table->enum('excluido',['n','s']);
            $table->text('reg_excluido')->nullable();
            $table->enum('deletado',['n','s']);
            $table->text('reg_deletado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profissaos');
    }
}
