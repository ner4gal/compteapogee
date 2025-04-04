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
        Schema::create('insc_resultat_par_module', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // Store the user details for convenience.
            $table->string('user_email');
            $table->string('user_name');
            // Request details.
            $table->string('etablissement');
            $table->date('date_demande');
            $table->string('cycle');
            $table->string('filiere');
            $table->string('nature_demande');
            $table->string('annee_inscription');
            $table->text('raison_retard');
            // Single module data (one module name).
            $table->string('module_nom');
            // List of students (JSON format).
            $table->json('students');
            // Request name with a default value.
            $table->string('nom_demande')
                  ->default("Demande d''insertion ou modification d''un résultat des années antérieures (Par Module)");
            $table->timestamps();

            // Foreign key constraint.
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
        Schema::dropIfExists('insc_resultat_par_module');
    }
};
