<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class CheckJwtLogin extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                // return response()->json(['status' => 'Token is Invalid']);
                $msg = [
                    'success' => false,
                    'message' => 'Token is Invalid'
                ];
                return response()->json([$msg]);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                // return response()->json(['status' => 'Token is Expired']);
                $msg = [
                    'success' => false,
                    'message' => 'Token is Expired'
                ];
                return response()->json([$msg]);
            }else{
                $msg = [
                    'success' => false,
                    'message' => 'Authorization Token not found'
                ];
                return response()->json([$msg]);
            }
        }
        return $next($request);
    }
}
