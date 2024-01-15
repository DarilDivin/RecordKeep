<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DemandeTransfert extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'libelle',
        'user_id',
        'valide',
        'transfere',
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bordereautransfert(): HasOne
    {
        return $this->hasOne(BordereauTransfert::class, 'demande_transfert_id', 'id');
    }
}
