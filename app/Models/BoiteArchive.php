<?php

namespace App\Models;

use App\Models\RayonRangement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BoiteArchive extends Model
{
    use HasFactory;

    public function rayonrangement(): BelongsTo
    {
        return $this->belongsTo(RayonRangement::class);
    }

    public function chemisedossiers(): HasMany
    {
        return $this->hasMany(ChemiseDossier::class);
    }
}
