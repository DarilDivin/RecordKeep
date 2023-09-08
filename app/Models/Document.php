<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Division;
use App\Models\Fonction;
use App\Models\Direction;
use App\Models\DemandePret;
use Illuminate\Support\Str;
use App\Models\ChemiseDossier;
use App\Models\NatureDocument;
use App\Models\DemandeTransfert;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom',
        'signature',
        'code',
        'objet',
        'source',
        'emetteur',
        'recepteur',
        'motclefs',
        'dua',
        'datecreation',
        'disponibilite',
        'archive',
        'document',
        'division_id',
        'service_id',
        'direction_id',
        'categorie_id',
        'chemise_dossier_id',
        'nature_document_id',
        'demande_transfert_id'
    ];

    protected $casts = [
        'datecreation' => 'datetime',
        'created_at' => 'datetime'
    ];

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

    public function demandetransfert(): BelongsTo
    {
        return $this->belongsTo(DemandeTransfert::class, 'demande_transfert_id', 'id');
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


    /* Pluck Methods */

    public static function getAllDocuments(): Collection
    {
        return self::all()->pluck('nom', 'id');
    }

    public static function getDocumentsNotHaveTransfer(): Collection
    {
        return self::where('demande_transfert_id', null)->pluck('nom', 'id');
    }

    public static function getDocumentsNotHaveTransferAndArchivnt(): Collection
    {
        return self::where('demande_transfert_id', null)->where('archive', 0)->pluck('nom', 'id');
    }

}
