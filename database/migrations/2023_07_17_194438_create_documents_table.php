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
            $table->string('nom');
            $table->string('signature');
            $table->string('code')->nullable();
            $table->string('objet');
            $table->string('source');
            $table->string('emetteur');
            $table->string('recepteur');
            $table->string('motclefs');
            $table->integer('dua');
            $table->date('datecreation');
            $table->boolean('disponibilite')->default(0);
            $table->boolean('archive')->default(0);
            $table->string('document')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
