<?php
namespace App\Repositories\Permission;

use Exception;
use Spatie\Permission\Models\Permission;
use App\Repositories\Permission\PermissionRepositoryInterface;

class PermissionRepository implements PermissionRepositoryInterface {
    public function index() {
        return Permission::all();
    }

    public function create($permission) {
        return Permission::create($permission);
    }

    public function show($id) {
        $permission = Permission::find($id);
        if(!$permission) {
            throw new Exception("Permission Not Found", 404);
        }
        return $permission;
    }

    public function update($validatedData, $id) {
        $permission = Permission::find($id);
        if(!$permission) {
            throw new Exception("Permission Not Found", 404);
        }
        return $permission->update($validatedData);
    }

    public function delete($id) {
        $permission = Permission::find($id);
        if(!$permission) {
            throw new Exception("Permission Not Found", 404);
        }
        return $permission->delete();
    }
}
