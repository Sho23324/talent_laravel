<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Repositories\Permission\PermissionRepositoryInterface;
use Illuminate\Http\Request;

class PermissionController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    private $permissionRepo;
    public function __construct(PermissionRepositoryInterface $permissionRepo)
    {
        $this->permissionRepo = $permissionRepo;
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
        $permission = $this->permissionRepo->getPermissionsById($id);
        $permission->delete();
        return $this->success($permission, "Permission deleted successfully", 204);
    }
}
