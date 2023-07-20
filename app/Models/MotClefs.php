<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MotClefs extends Model
{
    use HasFactory;

    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class);
    }
}
