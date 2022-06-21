<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(
                    [
                        'status'    => 'Token is Invalid',
                        'tokenErrorMessage'   => 'token_is_invalid'
                    ]);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json([
                    'status' => 'Token is Expired',
                    'tokenErrorMessage'   => 'token_is_Expired'
                ]);
            }else{
                return response()->json([
                    'status' => 'Authorization Token not found',
                    'tokenErrorMessage' => 'authorization_token_not_found'
                ]);
            }
        }
        return $next($request);
//        JWTAuth::parseToken()->authenticate();
//        return $next($request);
    }
}
