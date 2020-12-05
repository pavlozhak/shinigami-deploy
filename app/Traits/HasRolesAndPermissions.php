<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

/**
 * Trait HasRolesAndPermissions
 * @package App\Traits
 */
trait HasRolesAndPermissions
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }

    /**
     * @param mixed ...$roles
     * @return bool
     */
    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param array $permissions
     * @return bool
     */
    public function hasPermission(... $permissions)
    {
        foreach ($this->roles as $role) {
            foreach ($role->permissions as $permission) {
                if (in_array($permission->slug, $permissions)) {
                    return true;
                }
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
     * @param mixed ...$permissions
     * @return $this
     */
    public function givePermissionsTo(...$permissions)
    {
        $permissions = $this->getPermissions($permissions);
        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function getRoles(array $roles)
    {
        return Role::whereIn('slug', $roles)->get();
    }

    public function setRole(...$roles)
    {
        $roles = $this->getRoles($roles);
        if (is_null($roles)) {
            return $this;
        }

        $this->roles()->detach();
        $this->roles()->saveMany($roles);
        return $this;
    }

    /**
     * @param mixed ...$permissions
     * @return $this
     */
    public function deletePermissions(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    /**
     * @param mixed ...$permissions
     * @return HasRolesAndPermissions
     */
    public function refreshPermissions(...$permissions)
    {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }

}
