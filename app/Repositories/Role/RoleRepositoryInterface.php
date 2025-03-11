<?php
namespace App\Repositories\Role;

interface RoleRepositoryInterface {
    public function index();
    public function show($id);
    public function create($role);
    public function update($validatedData, $id, $request);
    public function delete($id);
}
