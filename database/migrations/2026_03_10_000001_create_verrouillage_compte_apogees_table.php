<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('verrouillage_compte_apogees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('user_email');
            $table->string('user_name');
            $table->string('nom_demande');
            $table->string('etablissement');
            $table->date('date_demande');
            $table->string('fonction');
            $table->string('nom_prenom');
            $table->string('username_apogee');
            $table->text('motif_verrouillage');
            $table->string('statut')->default('En attente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verrouillage_compte_apogees');
    }
};
