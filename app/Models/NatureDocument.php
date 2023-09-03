<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class NatureDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nature'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'nature_document_id', 'id');
    }

    /* Pluck Methods */

    public static function getAllNatureDocuments(): Collection
    {
        return self::all()->pluck('nature', 'id');
    }
}
