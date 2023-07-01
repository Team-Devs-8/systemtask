o<?php

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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('calificacion');
            $table->tinyInteger('estado')->default(1);
            $table->string('prioridad');
            //$table->enum('prioridad', ['baja', 'media', 'alta', 'urgente']);
            $table->timestamp('set_at');
            $table->timestamp('finish_at');
            $table->timestamps();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->cascadeOnUpdate()->nullOnDelete();

            //$table->unsignedBigInteger('user_id');
           /*  $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
};
