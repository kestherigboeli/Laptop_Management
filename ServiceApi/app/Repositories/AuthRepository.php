<?php

namespace App\Repositories;

use Illuminate\Http\JsonResponse;

class AuthRepository
{
    public function login($userRequest)
    {
        if (! $token = auth()->attempt($userRequest->only(['email', 'password']))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @param $token
     * @return JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
