<?php

use App\Models\Categorie;
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
        Schema::table('nature_documents', function (Blueprint $table) {
            $table->foreignIdFor(Categorie::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nature_documents', function (Blueprint $table) {
            $table->dropColumn('categorie_id');
        });
    }
};
