<?php

namespace App\Models;

use App\Models\Division;
use App\Models\Direction;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $fillable = [
        'service',
        'sigle',
        'direction_id',
    ];

    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }

    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class);
    }

    /* Pluck Methods */

    public static function getAllServices(): Collection
    {
        return self::all()->pluck('service', 'id');
    }
}
