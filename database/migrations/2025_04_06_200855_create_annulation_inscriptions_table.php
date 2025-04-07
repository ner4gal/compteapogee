<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnulationInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('annulation_inscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_email');
            $table->string('user_name');
            $table->string('etablissement');
            $table->date('date_demande');
            $table->string('cycle');
            $table->string('filiere');
            $table->string('annee_inscription');
            $table->text('raison_retard'); // Holds the annulment reason
            $table->json('students');
            $table->string('nom_demande');
            $table->string('statut')->default('En attente');
            $table->timestamps();

            // Optionally, add foreign key constraint if you have a users table:
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('annulation_inscriptions');
    }
}
