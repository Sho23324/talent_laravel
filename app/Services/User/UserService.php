<?php

use App\Repositories\User\UserRepositoryInterface;

class UserService {
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    // public function status($id) {

    // }
}
