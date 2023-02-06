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
        Schema::create('mascota', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('responsable_id')->unsigned();
            $table->string('identificacion');
            $table->string('nombre');
            $table->bigInteger('tipomascota_id')->unsigned();
            $table->timestamps();

            $table->foreign('responsable_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('tipomascota_id')->references('id')->on('tipomascota')->onDelete('cascade');
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
};
