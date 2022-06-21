<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function signup(UserRequest $userRequest): string
    {
        return $this->userRepository->signup($userRequest);
    }
}
