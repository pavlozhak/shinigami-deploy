<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function roles()
    {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }

    public static function getBySlug(string $slug): Permission
    {
        return Permission::where('slug', $slug)->first();
    }

}
