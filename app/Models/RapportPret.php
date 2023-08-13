<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RapportPret extends Model
{
    use HasFactory, SoftDeletes;

    public function demandePret() : BelongsTo
    {
        return $this->belongsTo(DemandePret::class, 'demande_pret_id', 'id');
    }
}
