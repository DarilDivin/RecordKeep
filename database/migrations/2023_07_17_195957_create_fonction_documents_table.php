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
        Schema::create('fonction_document', function (Blueprint $table) {
            $table->foreignIdFor(Fonction::class)->constrained();
            $table->foreignIdFor(Document::class)->constrained();

            $table->primary(['document_id', 'fonction_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fonction_documents');
    }
};
