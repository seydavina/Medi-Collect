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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->text('infoSocio')->nullable();
            $table->text('antecedent')->nullable();
            $table->text('signesCliniques')->nullable();
            $table->text('signesPara')->nullable();
            $table->text('traitement')->nullable();
            $table->text('evolutionApresSortie')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
