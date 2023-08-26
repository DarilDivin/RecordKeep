<?php

namespace App\Models;

use App\Models\TypeRole;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as OriginalModelPermission;

class Permission extends OriginalModelPermission
{
    use HasFactory;

    /* My Personnals Methods */

    public function granulariesPermissions(): HasMany
    {
        return $this->hasMany(SousPermission::class, 'permission_id', 'id');
    }

    public function typerole(): BelongsTo
    {
        return $this->belongsTo(TypeRole::class, 'type_role_id', 'id');
    }
}
