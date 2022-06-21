<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Resources\RequestResource;
use App\Http\Resources\UserResource;
use App\Models\Request;
use App\Repositories\AuthRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * @var AuthRepository
     */
    private $authRepository;

    /**
     * Create a new AuthController instance.
     *
     * @param AuthRepository $authRepository
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function login(AuthRequest $userRequest): JsonResponse
    {
        return $this->authRepository->login($userRequest);
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        if (auth()->user()->type === 2) {
            return response()->json([
                'user' => new UserResource(auth()->user()),
                'pendingRequests' => RequestResource::collection(Request::all())
            ]);
        }

        return response()->json([
            'user' => new UserResource(auth()->user()),
        ]);

    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        return $this->authRepository->logout();
    }
}
