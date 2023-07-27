<?php

namespace App\Models;

use App\Models\ChemiseDossier;
use App\Models\RayonRangement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoiteArchive extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function rayonrangement(): BelongsTo
    {
        return $this->belongsTo(RayonRangement::class);
    }

    public function chemisedossiers(): HasMany
    {
        return $this->hasMany(ChemiseDossier::class);
    }
}
