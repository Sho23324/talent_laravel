<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $roleRepo;
    private $permissionRepo;
    public function __construct(RoleRepositoryInterface $roleRepo, PermissionRepositoryInterface $permissionRepo)
    {
        $this->middleware('auth');
        $this->roleRepo = $roleRepo;
        $this->permissionRepo = $permissionRepo;
    }
    public function index()
    {   $roles = $this->roleRepo->getRoles();
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $permissions = $this->roleRepo->getRolePermissions();
        return view('role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $validatedData = $request->validated();
        $role = $this->roleRepo->create($validatedData);
        $role->permissions()->attach($request['permissions']);
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = $this->roleRepo->getRoleById($id);
        $permissions = $this->roleRepo->getRolePermissions($id);
        return view('role.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->roleRepo->getRoleById($id);
        $permissions = $this->permissionRepo->getPermissions();
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $role = $this->roleRepo->getRoleById($id);
        $role->update($validatedData);
        $role->permissions()->sync($request['permissions']);
        return redirect()->route('roles.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->roleRepo->deleteRolesById($id);
        return redirect()->route('roles.index');
    }
}
