<?php

namespace App\Models;

use App\Models\User;
use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fonction extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
