<?php
namespace App\Repositories\Role;

use Exception;
use Spatie\Permission\Models\Role;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface{
    public function create($data) {
        return Role::create($data);
    }

    public function index() {
        $roles = Role::with('permissions')->get();
        return $roles;
    }

    public function show($id) {
        $role = Role::find($id);
        if(!$role) {
            throw new Exception("Role Not Found", 404);
        }
        return $role;
    }

    public function update($validatedData, $id, $request) {
        $role = Role::find($id);
        if(!$role) {
            throw new Exception("Role Not Found", 404);
        }
        $role->permissions()->sync($request['permissions']);
        return $role->update($validatedData);
    }

    public function delete($id) {
        $role = Role::find($id);
        if(!$role) {
            throw new Exception("Role Not Found", 404);
        }
        return $role->delete();
    }
}
