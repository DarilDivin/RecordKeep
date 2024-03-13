<?php

namespace App\Models;

use App\Models\Document;
use App\Models\BoiteArchive;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChemiseDossier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'libelle',
        'code',
        'boite_archive_id'
    ];

    protected static function boot() {

        parent::boot();

        if (!app()->runningInConsole() && auth()->check()) {
            $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

            static::creating(function ($chemise) use ($userFullName) {
                $chemise->created_by = $userFullName;
            });

            static::created(function ($chemise) {
                $b = $chemise->boitearchive;
                $chemise->update([
                    'code' => $b->code . 'CH' . $b->chemisedossiers->count()
                ]);
            });

            static::updating(function ($chemise) use ($userFullName) {
                $chemise->updated_by = $userFullName;
            });

            static::updated(function ($chemise) {
                $b = $chemise->boitearchive;
                $chemise->code = $b->code . 'CH' . $b->chemisedossiers->count();
            });

            static::deleting(function ($chemise) use ($userFullName) {
                $chemise->deleted_by = $userFullName;
                $chemise->save();
            });
        }
    }

    public function boitearchive(): BelongsTo
    {
        return $this->belongsTo(BoiteArchive::class, 'boite_archive_id', 'id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'chemise_dossier_id', 'id');
    }

    /* Pluck Methods */

    public static function getAllChemises(): Collection
    {
        return self::all()->pluck('libelle', 'id');
    }
}
