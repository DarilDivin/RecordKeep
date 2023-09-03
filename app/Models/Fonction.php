<?php

namespace App\Models;

use App\Models\User;
use App\Models\Document;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fonction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fonction'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /* Pluck Methods */

    public static function getAllFonctions(): Collection
    {
        return self::all()->pluck('fonction', 'id');
    }
}
