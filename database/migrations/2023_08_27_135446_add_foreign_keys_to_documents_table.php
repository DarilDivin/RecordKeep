<?php

use App\Models\Service;
use App\Models\Division;
use App\Models\Direction;
use App\Models\ChemiseDossier;
use App\Models\NatureDocument;
use App\Models\DemandeTransfert;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->foreignIdFor(Division::class)->nullable();
            $table->foreignIdFor(Service::class)->nullable();
            $table->foreignIdFor(Direction::class);
            $table->foreignIdFor(NatureDocument::class);
            $table->foreignIdFor(DemandeTransfert::class)->nullable();
            $table->foreignIdFor(ChemiseDossier::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('division_id');
            $table->dropColumn('direction_id');
            $table->dropColumn('categorie_id');
            $table->dropColumn('nature_document_id');
            $table->dropColumn('demande_transfert_id');
            $table->dropColumn('chemise_dossier_id');
        });
    }
};
