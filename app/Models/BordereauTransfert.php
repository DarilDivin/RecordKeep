<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BordereauTransfert extends Model
{
    use HasFactory;

    protected $fillable = [
        'observation',
        'demande_transfert_id'
    ];

    public function demandetransfert(): BelongsTo
    {
        return $this->belongsTo(DemandeTransfert::class, 'demande_transfert_id', 'id');
    }
}
