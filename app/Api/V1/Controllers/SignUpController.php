<?php

namespace App\Api\V1\Controllers;

use Config;
use App\User;
use Illuminate\Database\QueryException;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\SignUpRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SignUpController extends Controller
{
    public function signUp(SignUpRequest $request, JWTAuth $JWTAuth)
    {
        $user = new User($request->all());
        try{
            $user = User::create($request->all());
        }catch (QueryException $e){
            $error_code = $e->errorInfo[1];
            if($error_code == 1062){
                return response()->json(['error'=>['message'=>'User is dissable.','status_code'=>$e->getCode()]],400);
            }else{
                return response()->json(['error'=>['message'=>$e->getMessage(),'status_code'=>$e->getCode()]],400);
            }
        }

        if(!Config::get('boilerplate.sign_up.release_token')) {
            return response()->json([
                'status' => 'ok'
            ], 201);
        }

        $token = $JWTAuth->fromUser($user);
        return response()->json([
            'status' => 'ok',
            'token' => $token
        ], 201);
    }
}
