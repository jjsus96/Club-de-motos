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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_evento');
            $table->string('cartel')->nullable();
            $table->date('fecha_inicio');
            $table->string('descripcion');
            $table->bigInteger('colaborador_id')->references('id')->on('colaboradores');
            $table->bigInteger('patrocinador_id')->references('id')->on('patrocinadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
};
