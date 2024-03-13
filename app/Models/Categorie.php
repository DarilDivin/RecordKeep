<?php

namespace App\Models;

use App\Models\NatureDocument;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'categorie'
    ];

    protected static function boot() {

        parent::boot();

        if (!app()->runningInConsole() && auth()->check()) {
            $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

            static::creating(function ($category) use ($userFullName) {
                $category->created_by = $userFullName;
            });

            static::updating(function ($category) use ($userFullName) {
                $category->updated_by = $userFullName;
            });

            static::deleting(function ($category) use ($userFullName) {
                $category->deleted_by = $userFullName;
                $category->save();
            });
        }

    }

    public function naturesDocuments(): HasMany
    {
        return $this->hasMany(NatureDocument::class);
    }

    public static function getAllCategories(): Collection
    {
        return self::all()->pluck('categorie', 'id');
    }
}
