<?php

namespace App\Models;

use App\Models\User;
use App\Models\Document;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fonction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fonction'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    protected static function boot() {

        parent::boot();

        if (!app()->runningInConsole() && auth()->check()) {
            $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

            static::creating(function ($fonction) use ($userFullName) {
                $fonction->created_by = $userFullName;
            });

            static::updating(function ($fonction) use ($userFullName) {
                $fonction->updated_by = $userFullName;
            });

            static::deleting(function ($fonction) use ($userFullName) {
                $fonction->deleted_by = $userFullName;
                $fonction->save();
            });
        }

    }

    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /* Pluck Methods */

    public static function getAllFonctions(): Collection
    {
        return self::orderBy('fonction', 'ASC')->pluck('fonction', 'id');
    }
}
