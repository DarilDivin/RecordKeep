<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeRole extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'libelle'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function severalPermissions(): HasMany
    {
        return $this->hasMany(Permission::class, 'type_role_id', 'id');
    }

    public function severalRoles(): HasMany
    {
        return $this->hasMany(Role::class, 'type_role_id', 'id');
    }
}
