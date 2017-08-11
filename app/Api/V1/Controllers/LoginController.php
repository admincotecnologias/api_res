<?php

namespace App\Api\V1\Controllers;

use App\User;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class LoginController extends Controller
{
    public function login(LoginRequest $request, JWTAuth $JWTAuth)
    {
        $credentials = $request->only(['email', 'password']);

        try {
            $token = $JWTAuth->attempt($credentials);
            if(!$token) {
                throw new AccessDeniedHttpException();
            }
            $user = User::where('email',$request->input('email'))->firstOrFail();
            return response()
                ->json([
                    'status' => 'ok',
                    'token' => $token,
                    'user' => $user
                ]);

        } catch (JWTException $e) {
            throw new HttpException(500);
        }catch (\Exception $e){
            throw new HttpException(500);
        }
    }
}
