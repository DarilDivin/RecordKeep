<?php

use App\Models\DemandePret;
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
        Schema::create('rapport_prets', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->text('observation');
            $table->string('etat_doc');
            $table->foreignIdFor(DemandePret::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('rapport_prets');
    }
};
