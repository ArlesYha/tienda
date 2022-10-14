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
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('idequipo');
            $table->string('serie', 45);
            $table->string('model', 45);
            $table->string('marca', 45);
            $table->integer('idpersona')->nullable();
            $table->timestamps();


            $table->foreign('idpersona')->references('idpersona')->on('personas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipos');
    }
};
