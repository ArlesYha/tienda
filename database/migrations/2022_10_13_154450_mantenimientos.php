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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->bigIncrements('idmantenimiento');
            $table->char('estado_mantenimiento', 1);
            $table->char('tipo_mantenimiento', 1);
            $table->date('fecha_mantenimiento');
            $table->text('descripcion');
            $table->integer('idequipo')->nullable();
            $table->timestamps();


            $table->foreign('idequipo')->references('idequipo')->on('equipos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mantenimientos');
    }
};
