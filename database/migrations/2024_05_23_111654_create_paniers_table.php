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
        Schema::create('paniers', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->integer('quantite');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_produit');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_produit')->references('id')->on('produits');
            $table->string('isCommanded')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paniers');
    }
};
