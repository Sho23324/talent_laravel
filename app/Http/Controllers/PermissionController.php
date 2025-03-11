<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Repositories\Permission\PermissionRepositoryInterface;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->middleware('auth');
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        $permissions = $this->permissionRepository->index();
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
        $this->permissionRepository->create($validatedData);
        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = $this->permissionRepository->show($id);
        return view('permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = $this->permissionRepository->show($id);
        $roles = $permission->roles->pluck('name')->toArray();
        return view('permission.edit', compact('permission', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->permissionRepository->update($validatedData, $id);
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->permissionRepository->delete($id);
        return redirect()->route('permissions.index');
    }
}
