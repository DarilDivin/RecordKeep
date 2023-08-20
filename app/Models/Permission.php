<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as OriginalModelPermission;

class Permission extends OriginalModelPermission
{
    use HasFactory;

    /* My Personnal Method */

    public function granulariesPermissions(): HasMany
    {
        return $this->hasMany(SousPermission::class, 'permission_id', 'id');
    }
}
