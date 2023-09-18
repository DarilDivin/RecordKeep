<?php

use App\Models\User;
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
        Schema::create('demande_transferts', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->boolean('transfere')->default(0);
            $table->boolean('valide')->default(0);
            $table->boolean('sr')->default(0);
            $table->boolean('cr')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_transferts');
    }
};
