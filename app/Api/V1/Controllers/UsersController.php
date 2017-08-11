<?php

namespace App\Api\V1\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
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
            return \response()->json(['error'=>['message'=>'User Not Found','status_code'=>404]],404);
        }
    }
}
