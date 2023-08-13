<?php

namespace App\Models;

use App\Models\BoiteArchive;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RayonRangement extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function boitearchives(): HasMany
    {
        return $this->hasMany(BoiteArchive::class, 'rayon_rangement_id', 'id');
    }

    /* Pluck Methods */

    public static function getAllRayons(): Collection
    {
        return self::all()->pluck('libelle', 'id');
    }
}
