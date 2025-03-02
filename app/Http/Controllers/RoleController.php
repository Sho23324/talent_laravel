<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $roleRepo;
    public function __construct(RoleRepositoryInterface $roleRepo)
    {
        $this->middleware('auth');
        $this->roleRepo = $roleRepo;
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
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $validatedData = $request->validated();
        $this->roleRepo->create($validatedData);
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = $this->roleRepo->getRoleById($id);
        return view('role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->roleRepo->getRoleById($id);
        return view('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $role = $this->roleRepo->getRoleById($id);
        $role->update($validatedData);
        return redirect()->route('roles.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = $this->roleRepo->getRoleById($id);
        $role->delete();
        return redirect()->route('roles.index');
    }
}
