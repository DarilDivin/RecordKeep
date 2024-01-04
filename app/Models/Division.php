<?php

namespace App\Models;

use Str;
use App\Models\User;
use App\Models\Service;
use App\Models\Document;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
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

    protected static function boot() {

        parent::boot();

        $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

        static::creating(function ($division) use ($userFullName) {
            $division->created_by = $userFullName;
        });

        static::updating(function ($division) use ($userFullName) {
            $division->updated_by = $userFullName;
        });

        static::deleting(function ($division) use ($userFullName) {
            $division->deleted_by = $userFullName;
            $division->save();
        });

    }

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
