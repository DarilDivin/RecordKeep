<?php

use App\Models\Direction;
use App\Models\Division;
use App\Models\NatureDocument;
use App\Models\Service;
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
            $table->string('signature');
            $table->string('code');
            $table->string('objet');
            $table->string('source')->nullable();
            $table->string('emetteur');
            $table->string('recepteur');
            $table->string('motclefs');
            $table->date('datecreation');
            $table->date('dateEnregistrement');
            $table->boolean('disponibilite');
            $table->boolean('status');
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
