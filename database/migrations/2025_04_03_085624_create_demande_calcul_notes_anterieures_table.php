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
        Schema::create('demande_calcul_notes_anterieures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_email');
            $table->string('user_name');
            $table->string('etablissement');
            $table->date('date_demande');
            $table->string('NomPrenomETD');   // Name & Surname
            $table->string('NumETD'); 
            $table->string('cycle');
            $table->string('filiere');
            $table->string('annee_universitaire');
            // New column for semesters (stored as JSON)
            $table->json('semesters')->nullable();
            $table->string('nom_demande')
                  ->default("Demande de calcul des notes à une année universitaire antérieure");
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_calcul_notes_anterieures');
    }
};
