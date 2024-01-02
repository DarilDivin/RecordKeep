<?php

namespace App\Models;

use App\Models\ChemiseDossier;
use App\Models\RayonRangement;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoiteArchive extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'libelle',
        'code',
        'rayon_rangement_id'
    ];

    protected static function boot() {
        parent::boot();

        static::created(function ($boite) {
            $r = $boite->rayonrangement;
            $boite->update([
                'code' => $r->code . 'B' . $r->boitearchives->count()
            ]);
        });

        static::updated(function ($boite) {
            $r = $boite->rayonrangement;
            $boite->code = $r->code . 'B' . $r->boitearchives->count();
        });

        static::deleting(function ($boite) {
            $boite->chemisedossiers->each(function ($chemise) {
                $chemise->delete();
            });
        });

    }

    public function rayonrangement(): BelongsTo
    {
        return $this->belongsTo(RayonRangement::class, 'rayon_rangement_id', 'id');
    }

    public function chemisedossiers(): HasMany
    {
        return $this->hasMany(ChemiseDossier::class, 'boite_archive_id', 'id');
    }

    /* Pluck Methods */

    public static function getAllBoites(): Collection
    {
        return self::all()->pluck('libelle', 'id');
    }
}
