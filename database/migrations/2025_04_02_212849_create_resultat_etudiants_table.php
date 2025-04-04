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
        Schema::create('resultat_etudiants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_email');
            $table->string('user_name');
            $table->string('NomPrenom');
            $table->string('etablissement');
            $table->date('date_demande');
            $table->string('cycle');
            $table->string('filiere');
            $table->string('nature_demande');
            $table->string('annee_inscription');
            $table->text('raison_retard');
            $table->json('modules'); // store students list
            $table->string('nom_demande')
    ->default("Demande d''insertion ou modification d''un résultat des années antérieures sur le système APOGEE (Par Étudiant)");

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
        Schema::dropIfExists('insc_annee_anterieures');
    }
};
