<?php

namespace App\Models;

use App\Models\User;
use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fonction extends Model
{
    use HasFactory;

    public function document(): BelongsToMany
    {
        return $this->belongsToMany(Document::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
