<?php

namespace App\Models;

use App\Models\User;
use App\Models\Service;
use App\Models\Document;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Direction extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $fillable = [
        'direction',
        'sigle',
    ];

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
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

    public static function getAllDirections(): Collection
    {
        return self::all()->pluck('direction', 'id');
    }
}
