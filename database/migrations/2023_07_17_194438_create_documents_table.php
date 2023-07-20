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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('numeroEnregistrement');
            $table->string('code');
            $table->string('objet');
            $table->string('source');
            $table->string('emetteur');
            $table->string('recepteur');
            $table->date('date');
            $table->string('disponibilite');
            $table->timestamps();

            $table->foreignIdFor(Chemise::class)->constrained();
            $table->foreignIdFor(NatureDoc::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
