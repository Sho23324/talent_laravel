<?php
namespace App\Repositories\Role;

interface RoleRepositoryInterface {
    public function getRoles();
    public function getRoleById($id);
    public function create($role);
}
