<?php

namespace App\Api\V1\Controllers;

use Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use \Tymon\JWTAuth\Facades\JWTAuth;



class UsersController extends Controller
{

    public function get_AuthUser(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        return \response()->json(['user'=>$user],200);
    }
    public function get_AllUsers(){
        $users = App\User::all();
        return \response()->json(['users'=>$users],200);
    }
    public function get_UserByID($id){
        try{
            return App\User::findOrFail($id);
        }catch (ModelNotFoundException $e){
            return \response()->json(['error'=>['message'=>'User Not Found','status_code'=>404]],404);
        }
    }
    public function delete_UserByID($id){
        try{
            $user = App\User::findOrFail($id);
            $user->delete();
            return \response()->json(['user'=>'deleted'],200);
        }catch (ModelNotFoundException $e){
            return \response()->json(
                ['error'=>[
                    'message'=>'User Not Found',
                    'status_code'=>404
                ]],
                404);
        }
    }
    public function post_Create_User(Request $request){
        $validator = Validator::make(App\User::$rules['create'],$request->all());
        if($validator->fails()){
            return response()->json(
                ['error'=>[
                    'message'=>$validator->errors()->all(),
                    'status_code'=>400
                ]
                ],
                400);
        }else{
            try{
                $user = new App\User();
                $user->fill($request->all());
                $user->saveOrFail();
                return \response()->json([
                    'user'=>$user
                ],
                    201);
            }catch (\Exception $e){
                return response()->json(
                    ['error'=>[
                        'message'=>$e->getMessage(),
                        'status_code'=>$e->getCode()
                    ]
                    ],
                    400);
            }
        }
    }
    public function post_User_Change_Password(Request $request){
        try{
            $user = JWTAuth::parseToken()->authenticate();
            $password = $user->getAuthPassword();
            $old = $request->input('old_password');
            if(Hash::check($old,$password)){
                $user->fill([
                    'password'=>$request->input('new_password')
                ]);
                $user->saveOrFail();
                return \response()->json(
                    ["message"=>"Cambio satisfactorio."],200);
            }else{
                return \response()->json(
                    ["error"=>[
                        "message"=>'Contraseña incorrecta.',
                        "status_code"=>401
                    ]
                    ],401);
            }
        }catch (\Exception $e){
            return \response()->json(
                ["error"=>[
                    "message"=>$e->getMessage(),
                    "status_code"=>$e->getCode()
                ]
                ],403);
        }
    }
}
