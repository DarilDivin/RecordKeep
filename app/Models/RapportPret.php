<?php

namespace App\Models;

use App\Models\DemandePret;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RapportPret extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function demandePret() : BelongsTo
    {
        return $this->belongsTo(DemandePret::class, 'demande_pret_id', 'id');
    }
}
