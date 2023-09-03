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
            $table->string('nom')->nullable();
            $table->string('signature')->nullable();
            $table->string('code')->nullable();
            $table->string('objet')->nullable();
            $table->string('source')->nullable();
            $table->string('emetteur')->nullable();
            $table->string('recepteur')->nullable();
            $table->string('motclefs')->nullable();
            $table->integer('dua')->nullable();
            $table->date('datecreation')->nullable();
            $table->boolean('disponibilite')->default(0);
            $table->boolean('archive')->default(0);
            $table->boolean('prete')->default(0);
            $table->string('document')->nullable();
            $table->integer('nbrdownload')->default(0);
            $table->integer('nbrconsult')->default(0);
            $table->dateTime('archived_at')->nullable();
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
