<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    private $roleRepo;
    public function __construct(RoleRepositoryInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }
    public function index()
    {
        $role = $this->roleRepo->getRoles();
        return $this->success($role, "Roles retrieved successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $validatedData = $request->validated();
        $role = $this->roleRepo->create($validatedData);
        return $this->success($role, "Role created successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = $this->roleRepo->getRoleById($id);
        return $this->success($role, "Role Details", 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $role = $this->roleRepo->getRoleById($id);
        $role->update($validatedData);
        return $this->success($role, "Role updated successfully", 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = $this->roleRepo->getRoleById($id);
        $role->delete();
        return $this->success($role, "Role deleted successfully", 204);
    }
}
