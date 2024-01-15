<?php

namespace App\Models;

use App\Models\BoiteArchive;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RayonRangement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'libelle',
        'code',
        'boites_number_max'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    protected static function boot() {

        parent::boot();

        if (!app()->runningInConsole()) {
            $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

            static::creating(function ($service) use ($userFullName) {
                $service->created_by = $userFullName;
            });

            static::created(function ($rayon) {
                $rayon->update([
                    'code' => 'R' . $rayon->id
                ]);
            });

            static::updating(function ($service) use ($userFullName) {
                $service->updated_by = $userFullName;
            });

            static::deleting(function ($rayon) use ($userFullName) {
                $rayon->boitearchives->each(function ($boite) {
                    $boite->delete();
                });
                $rayon->deleted_by = $userFullName;
                $rayon->save();
            });
        }

    }

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
