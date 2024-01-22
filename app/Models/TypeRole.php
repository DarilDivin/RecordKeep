<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
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

    protected static function boot() {

        parent::boot();

        if (!app()->runningInConsole()) {
            $userFullName = Auth::user()->nom . " " . Auth::user()->prenoms;

            static::creating(function ($typerole) use ($userFullName) {
                $typerole->created_by = $userFullName;
            });

            static::updating(function ($typerole) use ($userFullName) {
                $typerole->updated_by = $userFullName;
            });

            static::deleting(function ($typerole) use ($userFullName) {
                $typerole->deleted_by = $userFullName;
                $typerole->save();
            });
        }

    }

    public function severalPermissions(): HasMany
    {
        return $this->hasMany(Permission::class, 'type_role_id', 'id');
    }

    public function severalRoles(): HasMany
    {
        return $this->hasMany(Role::class, 'type_role_id', 'id');
    }
}
