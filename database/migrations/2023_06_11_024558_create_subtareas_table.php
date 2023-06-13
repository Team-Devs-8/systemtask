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
        Schema::create('subtareas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tarea_id');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('calificacion');
            $table->tinyInteger('estado')->default(1);
            $table->enum('prioridad', ['baja', 'media', 'alta', 'urgente']);
            $table->timestamp('set_at');
            $table->timestamp('finish_at');
            $table->timestamps();

            $table->foreign('tarea_id')->references('id')->on('tareas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subtareas');
    }
};
