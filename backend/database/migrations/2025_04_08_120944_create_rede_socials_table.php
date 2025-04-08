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
        Schema::create('rede_socials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deputado_id');
            $table->string('nome');
            $table->timestamps();

            $table->foreign('deputado_id')->references('id')->on('deputados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rede_socials');
    }
};
