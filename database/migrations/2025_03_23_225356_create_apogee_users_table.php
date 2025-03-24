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
        Schema::create('apogee_users', function (Blueprint $table) {
            $table->id();
            $table->string('etablissement');
            $table->string('nom_prenom');
            $table->string('email')->unique();
            $table->string('fonction')->nullable();
            $table->string('telephone')->nullable();
            $table->string('nom_utilisateur_apogee');
            $table->string('mac_address')->nullable();
            
            $table->string('centre_gestion')->nullable(); // stores value like CGC, CGS...
            $table->string('centre_traitement')->nullable(); // stores value like CTN, CTS...
    
            $table->json('centre_inscription_pedagogique')->nullable(); // multi-select
            $table->json('centre_incompatibilite')->nullable(); // multi-select
            $table->json('privileges_apogee')->nullable(); // multi-checkboxes
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apogee_users');
    }
};
