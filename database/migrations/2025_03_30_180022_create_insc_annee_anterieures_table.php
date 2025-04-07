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
        Schema::create('insc_annee_anterieures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('etablissement');
            $table->string('user_email');
            $table->string('user_name');
            $table->date('date_demande');
            $table->string('cycle');
            $table->string('filiere');
            $table->string('nature_demande');
            $table->string('annee_inscription');
            $table->text('raison_retard');
            $table->string('statut')->default('En attente');
            $table->json('students'); // store students list
            $table->string('nom_demande')->nullable(); // Add this line if needed
            $table->timestamps();
    
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        Schema::table('insc_annee_anterieures', function (Blueprint $table) {
            if (!Schema::hasColumn('insc_annee_anterieures', 'nom_demande')) {
                $table->string('nom_demande')->default('Demande d’inscription administrative à une annèe antèrieure');
            }
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
