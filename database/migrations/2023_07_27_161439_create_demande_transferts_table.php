<?php

use App\Models\Direction;
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
            /* $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete(); */
            $table->foreignIdFor(Direction::class)->constrained()->cascadeOnDelete();
            $table->boolean('transferable')->default(0);
            $table->boolean('transfere')->default(0);
            $table->boolean('valide')->default(0);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
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
