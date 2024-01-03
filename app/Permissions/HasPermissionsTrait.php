<?php
namespace App\Permissions;

use App\Models\Permission;
use App\Models\Role;

trait HasPermissionsTrait {

    /**
     * @param ...$permissions
     * @return $this
     */
    public function givePermissionsTo(... $permissions): static
    {
        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    /**
     * @param ...$permissions
     * @return $this
     */
    public function withdrawPermissionsTo( ... $permissions ): static
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;

    }

    /**
     * @param ...$permissions
     * @return HasPermissionsTrait
     */
    public function refreshPermissions( ... $permissions ): static
    {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }

    /**
     * @param $permission
     * @return bool
     */
    public function hasPermissionTo($permission): bool
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    /**
     * @param $permission
     * @return bool
     */
    public function hasPermissionThroughRole($permission): bool
    {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param ...$roles
     * @return bool
     */
    public function hasRole( ... $roles ): bool
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $permission
     * @return bool
     */
    protected function hasPermission($permission): bool
    {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    /**
     * @param array $permissions
     * @return mixed
     */
    protected function getAllPermissions(array $permissions): mixed
    {
        return Permission::whereIn('slug',$permissions)->get();
    }

    /**
     * @param $roles
     * @return true
     */
    public function authorizeRoles($roles): bool
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }

    /**
     * @param $roles
     * @return bool
     */
    public function hasAnyRole($roles): bool
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function roles(): mixed
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return mixed
     */
    public function permissions(): mixed
    {
        return $this->belongsToMany(Permission::class);
    }

}
