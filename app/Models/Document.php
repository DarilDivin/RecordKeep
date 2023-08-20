<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Division;
use App\Models\Fonction;
use App\Models\Direction;
use App\Models\Transfert;
use App\Models\DemandePret;
use Illuminate\Support\Str;
use App\Models\ChemiseDossier;
use App\Models\NatureDocument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function chemisedossier(): BelongsTo
    {
        return $this->belongsTo(ChemiseDossier::class, 'chemise_dossier_id', 'id');
    }

    public function naturedocument(): BelongsTo
    {
        return $this->belongsTo(NatureDocument::class, 'nature_document_id', 'id');
    }

    public function motclefs(): BelongsToMany
    {
        return $this->belongsToMany(ChemiseDossier::class);
    }

    public function transferts(): BelongsToMany
    {
        return $this->belongsToMany(Transfert::class);
    }

    public function fonctions(): BelongsToMany
    {
        return $this->belongsToMany(Fonction::class);
    }

    public function demandeprets(): HasMany
    {
        return $this->hasMany(DemandePret::class, 'document_id', 'id');
    }

    public function getSlug(): string
    {
        return Str::slug($this->nom);
    }

}
