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
        Schema::table('apogee_users', function (Blueprint $table) {
            $table->json('responsable_apogee_access')->nullable()->after('privileges_apogee');
        });
    }
    
    public function down(): void
    {
        Schema::table('apogee_users', function (Blueprint $table) {
            $table->dropColumn('responsable_apogee_access');
        });
    }
};
