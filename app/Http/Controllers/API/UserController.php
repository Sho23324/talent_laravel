<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\User\UserRepositoryInterface;
use Exception;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->index();
        return $this->success($users, "Users retrieved successful", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->userRepository->create($validatedData);
        $user->assignRole($validatedData['role']);
        return $this->success($user, "User successfully created", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = $this->userRepository->show($id);
            return $this->success($user, "User Details", 200);
        }catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "User Not Found", null, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();
        try {
            $user = $this->userRepository->update($validatedData, $id);
            return $this->success($user, "User updated successfully", 204);
        }catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "User Not Found", null, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = $this->userRepository->delete($id);
            return $this->success($user, "User deleted successfully", 204);
        }catch (Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "User Not Found", null, 404);
        }
    }
}
