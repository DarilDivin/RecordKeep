<?php

use App\Models\RayonRangement;
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
        Schema::create('boite_archives', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('code');
            $table->foreignIdFor(RayonRangement::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boite_archives');
    }
};
