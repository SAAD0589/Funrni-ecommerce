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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->float('PrixTotal');
            $table->enum('status', ['en cour', 'annuler', 'valide'])->default('en cour');
            $table->unsignedBigInteger('id_Pannier');
            $table->foreign('id_Pannier')->references('id')->on('paniers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
