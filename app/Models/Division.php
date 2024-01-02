<?php

namespace App\Models;

use Str;
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
        'sigle',
        'division',
        'service_id'
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

    /* public function getFormattedContent(): string {
        return nl2br(htmlentities($this->division));
        return str_replace("&#039;", "'", $this->division);
    } */

    /* Pluck Methods */

    public static function getAllDivisions(): Collection
    {
        return self::orderBy('division', 'ASC')->pluck('division', 'id');
    }
}
