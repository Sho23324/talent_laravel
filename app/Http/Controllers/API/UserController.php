<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    private $userRepo;
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getUsers();
        return $this->success($users, "Users retrieved successful", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->userRepo->create($validatedData);
        $user->assignRole($validatedData['role']);
        return $this->success($user, "User successfully created", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userRepo->getUserById($id);
        return $this->success($user, "User Details", 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $user = $this->userRepo->getUserById($id);
        $user->assignRole($validatedData['role']);
        $user->update($validatedData);
        return $this->success($user, "User updated successfully", 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->userRepo->getUserById($id);
        $user->delete();
        return $this->success($user, "User deleted successfully", 204);
    }

    public function status($request) {

    }
}
