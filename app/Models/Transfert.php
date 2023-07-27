<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transfert extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class);
    }
}
