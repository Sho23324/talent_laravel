<?php
namespace App\Repositories\User;

use App\Models\User;
use Exception;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface{
    public function index() {
        return User::all();
    }

    public function show($id) {
        $user = User::find($id);
        if(!$user) {
            throw new Exception("User Not Found", 404);
        }
        return $user;
    }

    public function create($data) {
        return User::create($data);
    }

    public function update($validatedData, $id) {
        $user = User::find($id);
        if(!$user) {
            throw new Exception("User Not Found", 404);
        }
        return $user->update([
            'name'=>$validatedData['name'],
            'phone'=>$validatedData['phone'],
            'address'=>$validatedData['address'],
            'gender'=>$validatedData['gender'],
            // 'status'=>$validatedData->status == 'active' ? true : false,
        ]);
    }

    public function delete($id) {
        $user = User::find($id);
        if(!$user) {
            throw new Exception("User Not Found", 404);
        }
        return $user->delete();
    }

}
