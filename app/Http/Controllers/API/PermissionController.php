<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;

class PermissionController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    private $permissionRepo;
    private $roleRepo;
    public function __construct(PermissionRepositoryInterface $permissionRepo, RoleRepositoryInterface $roleRepo)
    {
        $this->permissionRepo = $permissionRepo;
        $this->roleRepo = $roleRepo;
    }
    public function index()
    {
        $permissions = $this->permissionRepo->getPermissions();
        return $this->success($permissions, "Permissions retrieved successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $validatedData = $request->validated();
        $permission = $this->permissionRepo->create($validatedData);
        return $this->success($permission, "Permission created successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = $this->permissionRepo->getPermissionsById($id);
        return $this->success($permission, "Permissoin Details", 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $permission = $this->permissionRepo->getPermissionsById($id);
        $permission->update($validatedData);
        return $this->success($permission, "Permission updated successfully", 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = $this->permissionRepo->deletePermissionsById($id);
        return $this->success($permission, "Permission deleted successfully", 204);
    }

    public function assignPermissions(Request $request) {
        $role = $this->roleRepo->getRoleById($request->role);
        $permissions = $request->permission;
        foreach($permissions as $permission) {
            $permissions = $this->permissionRepo->getPermissionsById($permission);
            $role->givePermissionTo([$permissions->name]);
        }
        return $this->success(null, "Permissions assigned susccessfully", 204);
    }

    public function unassignPermissions(Request $request, $id) {
        $role = $this->roleRepo->getRoleById($id);
        $permissions = $request->permission;
        foreach($permissions as $permission) {
            $role->revokePermissionTo($permission);
        }
        return $this->success(null, "Permissions unassigned susccessfully", 204);
    }
}
