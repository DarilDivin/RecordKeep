<?php

use App\Models\BoiteArchive;
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
        Schema::create('chemise_dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('code');
            $table->timestamps();

            $table->foreignIdFor(BoiteArchive::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chemise_dossiers');
    }
};
