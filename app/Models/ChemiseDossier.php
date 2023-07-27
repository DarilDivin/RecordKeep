<?php

namespace App\Models;

use App\Models\Document;
use App\Models\BoiteArchive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChemiseDossier extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function boitearchive(): BelongsTo
    {
        return $this->belongsTo(BoiteArchive::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
