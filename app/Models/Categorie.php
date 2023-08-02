<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Categorie extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public static function getAllCategories(): Collection
    {
        return self::all()->pluck('catégorie', 'id');
    }
}
