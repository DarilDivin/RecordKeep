<?php

namespace App\Models;

use App\Models\Division as ModelsDivision;
use App\Models\User;
use App\Models\Service;
use App\Models\Document;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'division',
        'sigle',
        'service_id',
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }

    /* Pluck Methods */

    public static function getAllDivisions(): Collection
    {
        return self::all()->pluck('division', 'id');
    }
}
