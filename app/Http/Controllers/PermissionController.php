<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Repositories\Permission\PermissionRepositoryInterface;
use Illuminate\Http\Request;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $permissionRepo;
    public function __construct(PermissionRepositoryInterface $permissionRepo)
    {
        $this->middleware('auth');
        $this->permissionRepo = $permissionRepo;
    }
    public function index()
    {
        $permissions = $this->permissionRepo->getPermissions();
        return view('permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $validatedData = $request->validated();
        $this->permissionRepo->create($validatedData);
        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = $this->permissionRepo->getPermissionsById($id);
        return view('permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = $this->permissionRepo->getPermissionsById($id);
        return view('permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, string $id)
    {
        $permission = $this->permissionRepo->getPermissionsById($id);
        $validatedData = $request->validated();
        $permission->update($validatedData);
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = $this->permissionRepo->getPermissionsById($id);
        $permission->delete();
        return redirect()->route('permissions.index');
    }
}
