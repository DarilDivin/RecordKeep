<?php

namespace App\Models;

use App\Models\NatureDocument;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'categorie'
    ];

    public function naturesDocuments(): HasMany
    {
        return $this->hasMany(NatureDocument::class);
    }

    public static function getAllCategories(): Collection
    {
        return self::all()->pluck('categorie', 'id');
    }
}
