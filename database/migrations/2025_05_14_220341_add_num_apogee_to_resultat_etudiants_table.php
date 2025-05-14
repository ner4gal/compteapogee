<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('resultat_etudiants', function (Blueprint $table) {
        if (!Schema::hasColumn('resultat_etudiants', 'NumApogee')) {
            $table->string('NumApogee')->nullable()->after('NomPrenom');
        }
    });
}

public function down()
{
    Schema::table('resultat_etudiants', function (Blueprint $table) {
        $table->dropColumn('NumApogee');
    });
}
};
