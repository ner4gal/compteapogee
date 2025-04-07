<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppressionNoteEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('suppression_note_etudiants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_email');
            $table->string('user_name');
            $table->string('NomPrenom');       // Student's full name
            $table->string('NumApogee');       // Student's APOGEE number
            $table->string('etablissement');
            $table->date('date_demande');
            $table->string('cycle');
            $table->string('filiere');
            $table->string('Semestre');
            $table->string('annee_inscription');
            $table->string('nature_demande');  // e.g., "Suppression des notes"
            $table->text('raison_retard');     // Reason for suppression
            $table->json('modules');           // Stored as JSON
            $table->string('nom_demande');
            $table->string('statut')->default('En attente'); // Default status
            $table->timestamps();

            // Optionally add a foreign key constraint for user_id:
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('suppression_note_etudiants');
    }
}
