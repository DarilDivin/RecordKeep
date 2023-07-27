<?php

use App\Models\Service;
use App\Models\Division;
use App\Models\Direction;
use App\Models\ChemiseDossier;
use App\Models\NatureDocument;
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
            $table->foreignIdFor(NatureDocument::class);
            $table->foreignIdFor(ChemiseDossier::class)->nullable();
            $table->foreignIdFor(Division::class);
            $table->foreignIdFor(Service::class);
            $table->foreignIdFor(Direction::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('document', function (Blueprint $table) {
            //
        });
    }
};
