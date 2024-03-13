<?php

namespace App\Models;

use App\Models\DemandePret;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RapportPret extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime'
    ];

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

            static::deleting(function ($user) use ($userFullName) {
                $user->deleted_by = $userFullName;
                $user->save();
            });
        }

    }

    public function demandePret() : BelongsTo
    {
        return $this->belongsTo(DemandePret::class, 'demande_pret_id', 'id');
    }
}
