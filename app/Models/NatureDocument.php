<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NatureDocument extends Model
{
    use HasFactory;

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
