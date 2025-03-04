<?php
namespace App\Repositories\Permission;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRepository implements PermissionRepositoryInterface {
    public function getPermissions() {
        return Permission::all();
    }

    public function create($permission) {
        return Permission::create($permission);
    }

    public function getPermissionsById($id) {
        return Permission::find($id);
    }

    public function getRoles() {
        return Role::with('permissions')->get();
    }
}
