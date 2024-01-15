<?php

namespace App\Models;

use App\Models\User;
use App\Models\Service;
use App\Models\Document;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Direction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sigle',
        'direction',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    protected static function boot() {
        parent::boot();

        if (!app()->runningInConsole()) {
            $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

            static::creating(function ($direction) use ($userFullName) {
                $direction->created_by = $userFullName;
            });

            static::created(function ($direction) {
                $direction->services()->create([
                    'sigle' => 'AUCUN',
                    'service' => 'Aucun'
                ]);
            });

            static::updating(function ($direction) use ($userFullName) {
                $direction->updated_by = $userFullName;
            });

            static::deleting(function ($direction) use ($userFullName) {
                $direction->services->each(function ($service) {
                    $service->delete();
                });
                $direction->deleted_by = $userFullName;
                $direction->save();
            });
        }

    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }

    /* Pluck Methods */

    public static function getAllDirections(): Collection
    {
        return self::orderBy('direction', 'ASC')->pluck('direction', 'id');
    }
}
