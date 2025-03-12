<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Repositories\Role\RoleRepositoryInterface;
use Exception;

class RoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    private $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $role = $this->roleRepository->index();
        $data = RoleResource::collection($role);
        return $this->success($data, "Roles retrieved successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $validatedData = $request->validated();
        $role = $this->roleRepository->create($validatedData);
        return $this->success($role, "Role created successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $role = $this->roleRepository->show($id);
            $data = new RoleResource($role);
            return $this->success($data, "Role Details", 200);
        }catch (Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Role Not Found", null, $e->getCode() ? $e->getCode() : 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $validatedData = $request->validated();
        try {
            $role = $this->roleRepository->update($validatedData, $id, $request);
            return $this->success($role, "Role updated successfully", 200);
        }catch (Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Role Not Found", null, $e->getCode() ? $e->getCode() : 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $role = $this->roleRepository->delete($id);
            return $this->success($role, "Role deleted successfully", 204);
        }catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Role Not Found", null, $e->getCode() ? $e->getCode() : 500);
        }
    }
}
