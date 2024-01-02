<?php

namespace App\Models;

use App\Models\Document;
use App\Models\Categorie;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NatureDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nature',
        'categorie_id',
        'duree-communicabilite',
        'dua_bureaux',
        'dua_service_pre_archivage'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'nature_document_id', 'id');
    }

    public function categorie(): BelongsTo {
        return $this->belongsTo(Categorie::class);
    }

    /* Pluck Methods */

    public static function getAllNatureDocuments(): Collection
    {
        return self::all()->pluck('nature', 'id');
    }
}
