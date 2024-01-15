<?php

namespace App\Models;

use Carbon\Carbon;
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
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom',
        'timbre',
        'code',
        'objet',
        'emetteur',
        'recepteur',
        'motclefs',
        'datecreation',
        'disponibilite',
        'archive',
        'prete',
        'communicable',
        'standardDUAFinished',
        'centralDUAFinished',
        'document',
        'division_id',
        'service_id',
        'direction_id',
        'chemise_dossier_id',
        'nature_document_id',
        'demande_transfert_id',
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    protected static function boot() {

        parent::boot();

        if (!app()->runningInConsole()) {
            $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

            static::creating(function ($document) use ($userFullName) {
                $document->standardDUAFinished = Carbon::parse($document->datecreation)->addYears($document->naturedocument->dua_bureaux);
                $document->centralDUAFinished = Carbon::parse($document->datecreation)->addYears($document->naturedocument->dua_bureaux + $document->naturedocument->dua_service_pre_archivage);
                $document->created_by = $userFullName;
            });

            static::updating(function ($document) use ($userFullName) {
                $document->updated_by = $userFullName;
            });

            static::deleting(function ($user) use ($userFullName) {
                $user->deleted_by = $userFullName;
                $user->save();
            });
        }

    }

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

    public function getDateCreation(): Carbon
    {
        return Carbon::parse($this->datecreation);
    }


    /* Pluck Methods */

    public static function getAllDocuments(): Collection
    {
        return self::all()->pluck('nom', 'id');
    }

    public static function getUserDirectionDocumentsNotHaveTransfer(): Collection
    {
        return self::where('demande_transfert_id', null)
            ->where('direction_id', Auth::user()->direction->id)
            ->pluck('nom', 'id');
    }

}
