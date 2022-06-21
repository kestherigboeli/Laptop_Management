<?php

namespace App\Repositories;

use App\Models\User;
use App\Responses\Responses;

class UserRepository
{
    /**
     * @var Responses
     */
    private $responses;

    public function __construct(Responses $responses)
    {
        $this->responses = $responses;
    }

    public function signup($userRequest)
    {
        try {
            $userRequest['password'] = bcrypt($userRequest['password']);
            $newUser = User::create($userRequest->toArray());
            return response()->json([
                'message' => $this->responses->userCreated()[0],
                'user' => $newUser
            ]);
        } catch (\Exception $exception) {
            return  $exception;
        }
    }
}
