<?php
namespace App\Repositories\User;

interface UserRepositoryInterface {
    public function getUsers();
    public function getUserById($id);
    public function create($data);
}
