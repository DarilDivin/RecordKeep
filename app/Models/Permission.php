<?php

namespace App\Models;

use App\Models\TypeRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as OriginalModelPermission;

class Permission extends OriginalModelPermission
{
    use HasFactory, SoftDeletes;

    protected static function boot() {

        parent::boot();

        if (!app()->runningInConsole() && auth()->check()) {
            $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

            static::creating(function ($permission) use ($userFullName) {
                $permission->created_by = $userFullName;
            });

            static::updating(function ($permission) use ($userFullName) {
                $permission->updated_by = $userFullName;
            });

            static::deleting(function ($permission) use ($userFullName) {
                $permission->deleted_by = $userFullName;
                $permission->save();
            });
        }

    }

    public function typerole(): BelongsTo
    {
        return $this->belongsTo(TypeRole::class, 'type_role_id', 'id');
    }
}
