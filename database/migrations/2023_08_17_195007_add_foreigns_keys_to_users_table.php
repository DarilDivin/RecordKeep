<?php

use App\Models\Direction;
use App\Models\Division;
use App\Models\Fonction;
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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(Division::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Service::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Direction::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Fonction::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('division_id');
            $table->dropColumn('service_id');
            $table->dropColumn('direction_id');
            $table->dropColumn('fonction_id');
        });
    }
};
