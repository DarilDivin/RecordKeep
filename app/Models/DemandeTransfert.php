<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DemandeTransfert extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function getSlug(): string
    {
        return Str::slug($this->libelle);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'demande_transfert_id', 'id');
    }
}
