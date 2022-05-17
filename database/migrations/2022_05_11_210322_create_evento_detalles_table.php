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
        Schema::create('evento_detalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('evento_id')->references('id')->on('eventos');
            $table->bigInteger('usuario_id')->references('id')->on('users');
            $table->bigInteger('acepta')->default(0);
            $table->bigInteger('rechaza')->default(0);
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
        Schema::dropIfExists('evento_detalles');
    }
};
