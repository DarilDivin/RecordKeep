<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BordereauTransfert extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'observation',
        'demande_transfert_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected static function boot() {

        parent::boot();

        if (!app()->runningInConsole() && auth()->check()) {
            $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

            static::creating(function ($bordereau) use ($userFullName) {
                $bordereau->created_by = $userFullName;
            });

            static::updating(function ($bordereau) use ($userFullName) {
                $bordereau->updated_by = $userFullName;
            });

            static::deleting(function ($bordereau) use ($userFullName) {
                $bordereau->deleted_by = $userFullName;
                $bordereau->save();
            });
        }

    }

    public function demandetransfert(): BelongsTo
    {
        return $this->belongsTo(DemandeTransfert::class, 'demande_transfert_id', 'id');
    }
}
