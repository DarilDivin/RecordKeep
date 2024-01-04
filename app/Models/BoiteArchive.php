<?php

namespace App\Models;

use App\Models\ChemiseDossier;
use App\Models\RayonRangement;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
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

        $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

        static::created(function ($boite) {
            $r = $boite->rayonrangement;
            $boite->update([
                'code' => $r->code . 'B' . $r->boitearchives->count()
            ]);
        });

        static::creating(function ($boite) use ($userFullName) {
            $boite->created_by = $userFullName;
        });

        static::updated(function ($boite) {
            $r = $boite->rayonrangement;
            $boite->code = $r->code . 'B' . $r->boitearchives->count();
        });

        static::updating(function ($boite) use ($userFullName) {
            $boite->updated_by = $userFullName;
        });

        static::deleting(function ($boite) use ($userFullName) {
            $boite->chemisedossiers->each(function ($chemise) {
                $chemise->delete();
            });
            $boite->deleted_by = $userFullName;
            $boite->save();
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
