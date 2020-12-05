<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }

    public static function getBySlug(string $slug): Role
    {
        return Role::where('slug', $slug)->first();
    }

    public function hasPermission(string $permissionSlug)
    {
        foreach ($this->permissions as $permission)
        {
            if($permission->slug == $permissionSlug)
            {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array $permissions
     * @return mixed
     */
    public function getPermissions(array $permissions)
    {
        return Permission::whereIn('slug', $permissions)->get();
    }

    /**
     * @param array $permissions
     * @return $this
     */
    public function givePermissions(array $permissions)
    {
        $permissions = $this->getPermissions($permissions);
        if ($permissions === null) {
            return $this;
        }

        $this->permissions()->detach();
        $this->permissions()->saveMany($permissions);
        return $this;
    }

}
