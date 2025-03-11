<?php
namespace App\Repositories\User;

interface UserRepositoryInterface {
    public function index();
    public function show($id);
    public function create($data);
    public function update($validatedData, $id);
    public function delete($id);
}
