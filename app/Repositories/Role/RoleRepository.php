<?php
namespace App\Repositories\Role;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface{
    public function create($data) {
        return Role::create($data);
    }

    public function getRoles() {
        $roles = Role::all();
        return $roles;
    }

    public function getRoleByid($id) {
        $role = Role::find($id);
        return $role;
    }

    public function getRolePermissions() {
        $permissions = Permission::with('roles')->get();
        return $permissions;
    }

    public function deleteRolesById($id) {
        $role = Role::find($id);
        return $role->delete();
    }
}
