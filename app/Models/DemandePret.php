<?php

namespace App\Models;

use App\Models\User;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandePret extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected static function boot() {

        parent::boot();

        if (!app()->runningInConsole() && auth()->check()) {
            $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

            static::creating(function ($pret) use ($userFullName) {
                $pret->created_by = $userFullName;
            });

            static::updating(function ($pret) use ($userFullName) {
                $pret->updated_by = $userFullName;
            });

            static::deleting(function ($pret) use ($userFullName) {
                $pret->deleted_by = $userFullName;
                $pret->save();
            });
        }

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }

    public function rapportprets(): HasMany
    {
        return $this->hasMany(RapportPret::class, 'demande_pret_id', 'id');
    }

}
