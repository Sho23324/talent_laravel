<?php
namespace App\Repositories\Permission;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRepository implements PermissionRepositoryInterface {
    public function getPermissions() {
        $permissions = Permission::all();
        return $permissions;
    }

    public function create($permission) {
        $permission = Permission::create($permission);
    }

    public function getPermissionsById($id) {
        $permission = Permission::find($id);
        return $permission;
    }

    public function getRoles() {
        $roles = Role::with('permissions')->get();
        return $roles;
    }
}
