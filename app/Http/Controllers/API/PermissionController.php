<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    private $permissionRepository;
    private $roleRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $permissions = $this->permissionRepository->index();
        $data = PermissionResource::collection($permissions);
        return $this->success($data, "Permissions retrieved successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $validatedData = $request->validated();
        $permission = $this->permissionRepository->create($validatedData);
        $data = new PermissionResource($permission);
        return $this->success($data, "Permission created successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $permission = $this->permissionRepository->show($id);
            $data = new PermissionResource($permission);
            return $this->success($data, "Permissoin Details", 200);
        }catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Permission Not Found", null, $e->getCode() ? $e->getCode() : 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, string $id)
    {
        try {
            $validatedData = $request->validated();
            $permission = $this->permissionRepository->update($validatedData, $id);
            return $this->success($permission, "Permission updated successfully", 200);
        }catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Permission Not Found", null, $e->getCode() ? $e->getCode() : 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $permission = $this->permissionRepository->delete($id);
            return $this->success($permission, "Permission deleted successfully", 204);
        }catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Permission Not Found", null, $e->getCode() ? $e->getCode() : 500);
        }
    }

    public function assignPermissions(Request $request, $id) {
        try {
            $role = $this->roleRepository->show($id);
            $permissions = $request->permission;
            foreach($permissions as $permission) {
                $permissions = $this->permissionRepository->show($permission);
                $role->givePermissionTo([$permissions->name]);
            }
            return $this->success(null, "Permissions assigned susccessfully", 204);
        }catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Permission Not Found", null, $e->getCode() ? $e->getCode() : 500);
        }
    }

    public function unassignPermissions(Request $request, $id) {
        try {
            $role = $this->roleRepository->show($id);
            $permissions = $request->permission;
            foreach($permissions as $permission) {
                $role->revokePermissionTo($permission);
            }
            return $this->success(null, "Permissions unassigned susccessfully", 204);
        }catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Permission Not Found", null, $e->getCode() ? $e->getCode() : 500);
        }
    }
}
