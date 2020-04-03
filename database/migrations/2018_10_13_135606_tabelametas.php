<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabelametas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->increments('id');
            $table->float('valor_meta');
            $table->datetime('Data_inicio');
            $table->datetime('Data_fim');
            $table->float('realizado');
            $table->unsignedInteger('id_safra');
            $table->unsignedInteger('id_atividade');
            $table->unsignedInteger('id_funcionario');
            $table->nullableTimestamps();
             $table->foreign('id_safra')->references('id')->on('safra');
             $table->foreign('id_atividade')->references('id')->on('atividade');
             $table->foreign('id_funcionario')->references('id')->on('funcionario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
