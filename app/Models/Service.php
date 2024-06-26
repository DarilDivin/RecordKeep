<?php

namespace App\Models;

use App\Models\User;
use App\Models\Division;
use App\Models\Document;
use App\Models\Direction;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sigle',
        'service',
        'direction_id'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    protected static function boot() {

        parent::boot();

        if (!app()->runningInConsole() && auth()->check()) {
            $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

            static::creating(function ($service) use ($userFullName) {
                $service->created_by = $userFullName;
            });

            static::created(function ($service) {
                $service->divisions()->create([
                    'sigle' => 'AUCUNE',
                    'division' => 'Aucune'
                ]);
            });

            static::updating(function ($service) use ($userFullName) {
                $service->updated_by = $userFullName;
            });

            static::deleting(function ($service) {
                $service->divisions->each(function ($division) {
                    $division->delete();
                });
            });
        }

    }

    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }

    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class);
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

    public static function getAllServices(): Collection
    {
        return self::orderBy('service', 'ASC')->pluck('service', 'id');
    }
}
