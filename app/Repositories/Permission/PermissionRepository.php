<?php
namespace App\Repositories\Permission;

use Illuminate\Http\Request;
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

    public function deletePermissionsById($id) {
        $permission = Permission::find($id);
        return $permission->delete();
    }

    // public function unassignPermissionsByRole($id) {

    //     $permission = Permission::where('role_id', $id)->first();
    //     $permission->delete()->where()
    // }
}
