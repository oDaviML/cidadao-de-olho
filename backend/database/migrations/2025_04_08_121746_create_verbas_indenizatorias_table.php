<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('verbas_indenizatorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deputado_id');
            $table->integer('ano');
            $table->integer('mes');
            $table->decimal('valor', 10, 2);
            $table->string('descricao');
            $table->timestamps();

            $table->foreign('deputado_id')->references('id')->on('deputados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verbas_indenizatorias');
    }
};
