<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeTransfert extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'libelle',
        'direction_id',
        'transferable',
        'transfere',
        'valide',
        'sw', 'cw',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected static function boot() {

        parent::boot();

        if (!app()->runningInConsole() && auth()->check()) {
            $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

            static::creating(function ($transfert) {
                $transfert->created_by = "RECORD KEEPER";
            });

            static::updating(function ($transfert) {
                $transfert->updated_by = "RECORD KEEPER";
            });

            static::deleting(function ($user) use ($userFullName) {
                $user->deleted_by = $userFullName;
                $user->save();
            });
        }

    }

    public function getSlug(): string
    {
        return Str::slug($this->libelle);
    }

    public function isSend(): bool
    {
        return (bool) $this->transfert;
    }

    public function isValid(): bool
    {
        return (bool) $this->valide;
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'demande_transfert_id', 'id');
    }

    /* public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    } */

    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class, 'direction_id', 'id');
    }

    public function bordereautransfert(): HasOne
    {
        return $this->hasOne(BordereauTransfert::class, 'demande_transfert_id', 'id');
    }
}
