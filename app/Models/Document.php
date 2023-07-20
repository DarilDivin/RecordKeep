<?php

namespace App\Models;

use App\Models\Division;
use App\Models\Fonction;
use App\Models\DemandePret;
use App\Models\ChemiseDossier;
use App\Models\NatureDocument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model
{
    use HasFactory;

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function fonctions(): BelongsToMany
    {
        return $this->belongsToMany(Fonction::class);
    }

    public function naturedocument(): BelongsTo
    {
        return $this->belongsTo(NatureDocument::class);
    }

    public function chemisedossier(): BelongsTo
    {
        return $this->belongsTo(ChemiseDossier::class);
    }

    public function motclefs(): BelongsToMany
    {
        return $this->belongsToMany(ChemiseDossier::class);
    }

    public function demandeprets(): BelongsToMany
    {
        return $this->belongsToMany(DemandePret::class);
    }
}
