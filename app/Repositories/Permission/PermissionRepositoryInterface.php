<?php
namespace App\Repositories\Permission;
interface PermissionRepositoryInterface {
    public function getPermissions();
    public function getPermissionsById($id);
    public function create($permission);
    public function deletePermissionsById($id);
    public function getRoles();
}
