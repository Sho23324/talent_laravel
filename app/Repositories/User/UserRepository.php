<?php
namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface{
    public function getUsers() {
        return User::all();
    }

    public function getUserById($id) {
        return User::find($id);
    }

    public function create($data) {
        return User::create($data);
    }

    public function deleteUsersById($id) {
        $user = User::find($id);
        return $user->delete();
    }

}
