<?php

use App\Models\Service;
use App\Models\Division;
use App\Models\Categorie;
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
            $table->foreignIdFor(Division::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Service::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Direction::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Categorie::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(NatureDocument::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(DemandeTransfert::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(ChemiseDossier::class)->nullable()->constrained()->cascadeOnDelete();
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
