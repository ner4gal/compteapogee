<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('verrouillage_compte_apogees')) {
            return;
        }

        $hasOldColumn = Schema::hasColumn('verrouillage_compte_apogees', 'resultat_verrouillage');
        $hasNewColumn = Schema::hasColumn('verrouillage_compte_apogees', 'motif_verrouillage');

        if (! $hasNewColumn) {
            Schema::table('verrouillage_compte_apogees', function (Blueprint $table) {
                $table->text('motif_verrouillage')->nullable()->after('username_apogee');
            });
        }

        if ($hasOldColumn) {
            DB::table('verrouillage_compte_apogees')
                ->whereNull('motif_verrouillage')
                ->update([
                    'motif_verrouillage' => DB::raw('resultat_verrouillage'),
                ]);
        }
    }

    public function down(): void
    {
        if (! Schema::hasTable('verrouillage_compte_apogees')) {
            return;
        }

        if (Schema::hasColumn('verrouillage_compte_apogees', 'motif_verrouillage')) {
            Schema::table('verrouillage_compte_apogees', function (Blueprint $table) {
                $table->dropColumn('motif_verrouillage');
            });
        }
    }
};
