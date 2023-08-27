<?php

namespace App\Models;

use App\Models\TypeRole;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as OriginalModelRole;

class Role extends OriginalModelRole
{
    use HasFactory;

    public function typerole(): BelongsTo
    {
        return $this->belongsTo(TypeRole::class, 'type_role_id', 'id');
    }
}
