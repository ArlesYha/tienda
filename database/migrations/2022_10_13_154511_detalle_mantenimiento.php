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
        Schema::create('detalle_mantenimiento', function (Blueprint $table) {
            $table->increments('iddetalle_mantenimiento');
            $table->integer('cantidad_componentes');
            $table->integer('idmantenimiento')->nullable();
            $table->integer('idcomponente')->nullable();
            $table->integer('idusuario')->nullable();
            $table->timestamps();

            $table->foreign('idmantenimiento')->references('idmantenimiento')->on('mantenimientos')->onDelete('cascade');
            $table->foreign('idcomponente')->references('idcomponente')->on('componentes')->onDelete('cascade');
            $table->foreign('idusuario')->references('idusuario')->on('usuarios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_mantenimiento');
    }
};
