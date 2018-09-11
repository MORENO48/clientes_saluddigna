<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('appaterno',50);
            $table->string('apmaterno',50);
            $table->dateTime('fechanac');
            $table->string('calle',50);
            $table->integer('numext');
            $table->string('colonia',50);
            $table->integer('cp');
            $table->string('ciudad',50);
            $table->string('estado',50);
            $table->unsignedInteger('estudiorealizar');
            $table->foreign('estudiorealizar')->references('id')->on('estudios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientes');
    }
}
