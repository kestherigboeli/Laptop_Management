<?php

namespace App\Repositories;

use App\Http\Resources\RequestResource;
use App\Http\Resources\UserResource;
use App\Models\Request;
use App\Models\User;
use App\Responses\Responses;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class RequestRepository
{

    /**
     *
     * @return JsonResponse
     *
     */
    public function requestLaptop($loanRequest)
    {
        try {

            $loanRequest['user_id'] = auth()->user()->id;
            Request::create($loanRequest->toArray());
            return response()->json([
                'user' => new UserResource(User::findOrFail(auth()->user()->id)),
                'pendingRequests' => RequestResource::collection(Request::all()),
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'failed',
            ]);
        }
    }

    /**
     *
     * @return JsonResponse
     *
     */
    public function cancelRequest($requestId): JsonResponse
    {
        try {

            $user = Request::where('id', $requestId)->first();
            $user->update([
                'status' => Responses::cancelled
            ]);

            if (auth()->user()->type === 2) {
                return response()->json([
                    'user' => new UserResource(User::findOrFail(auth()->user()->id)),
                    'pendingRequests' => RequestResource::collection(Request::all()),
                    'message' => 'request cancelled successfully'
                ]);
            }

            return response()->json([
                'user' => new UserResource(User::findOrFail(auth()->user()->id)),
                'message' => 'request cancelled successfully'
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'failed',
            ]);
        }
    }
}
