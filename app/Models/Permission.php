<?php

namespace App\Models;

use App\Models\TypeRole;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission as OriginalModelPermission;

class Permission extends OriginalModelPermission
{
    use HasFactory, SoftDeletes;

    public function typerole(): BelongsTo
    {
        return $this->belongsTo(TypeRole::class, 'type_role_id', 'id');
    }
}
