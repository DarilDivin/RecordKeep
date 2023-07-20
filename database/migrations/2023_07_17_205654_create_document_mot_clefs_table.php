<?php

use App\Models\Document;
use App\Models\MotClefs;
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
        Schema::create('document_motclef', function (Blueprint $table) {
            $table->foreignIdFor(Document::class);
            $table->foreignIdFor(MotClefs::class);

            $table->primary(['document_id', 'motclefs_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_mot_clefs');
    }
};
