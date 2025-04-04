<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('insc_annee_anterieures_doctorat', function (Blueprint $table) {
            $table->id();
            // User details (from authentication)
            $table->unsignedBigInteger('user_id');
            $table->string('user_email');
            $table->string('user_name');
            // Form fields exactly as provided:
            $table->string('etbl');           // Etablissement
            $table->string('ced');            // CED
            $table->date('dateDM');           // Date de la demande
            $table->string('nomPrenom');      // Nom & Prénom (Doctorant)
            $table->string('date1Ins');         // Date de la 1ère inscription
            $table->string('CIN');            // CIN
            $table->string('CNE');            // CNE
            $table->string('tel');            // Numéro Telephone
            $table->string('email');          // Email Institutionnel
            $table->string('NumApogee');      // N° Apogee
            $table->string('FormationDoctorale');   // Formation Doctorale
            $table->string('StructureRecherche');     // Structure de Recherche
            $table->string('DirThese');       // Directeur de thèse
            $table->string('aneINS');         // Année d'inscription concernée
            $table->string('nrtDM');          // Nature de la demande
            $table->text('mtf');              // La raison du retard
            // Default request name (with escaped quotes)
            $table->string('nom_demande')
                  ->default("Demande d''inscription administrative à une année antérieure (Cycle Doctorat)");
            $table->timestamps();

            // Set foreign key constraint for the user
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('insc_annee_anterieures_doctorat');
    }
};
