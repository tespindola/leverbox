<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->mediumText('patente');
            $table->integer('marca');
            $table->integer('modelo');
            $table->integer('version');
            $table->integer('year');
            $table->mediumText('chasis');
            $table->mediumText('kilometraje');
            $table->mediumText('fecha');
            $table->mediumText('franquicia');
            $table->mediumText('url_denuncia');
            $table->mediumText('url_anexos');
            $table->mediumText('nombre');
            $table->mediumText('dni');
            $table->mediumText('email');
            $table->mediumText('pais');
            $table->mediumText('celular');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
