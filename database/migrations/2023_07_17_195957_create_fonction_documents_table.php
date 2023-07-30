<?php

use App\Models\Document;
use App\Models\Fonction;
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
        Schema::create('document_fonction', function (Blueprint $table) {
            $table->foreignIdFor(Document::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Fonction::class)->constrained()->cascadeOnDelete();

            $table->primary(['document_id', 'fonction_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_fonction');
    }
};
