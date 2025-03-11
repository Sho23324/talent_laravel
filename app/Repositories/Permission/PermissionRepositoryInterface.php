<?php
namespace App\Repositories\Permission;
interface PermissionRepositoryInterface {
    public function index();
    public function show($id);
    public function create($permission);
    public function update($validatedData, $id);
    public function delete($id);
}
