<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class Auth extends Controller
{
    //
    public function Change_Password(Request $request,$token){
        try{
            $validator = Validator::make($request->all(),['email'=>'required|email','password'=>'required|confirmed']);
            if($validator->fails()){
                return view('token',['token'=>$token,'error'=>$validator->errors()->all(),'status'=>'warning']);
            }else{
                $reset = DB::table('password_resets')->select('token')->where('email',$request->input('email'))->first();
                if($reset){
                    if (Hash::check($token,$reset->token)) {
                        $user = User::where('email',$request->input('email'))->firstOrFail();
                        if($user){
                            $user->password = $request->input('password');
                            $user->saveOrFail();
                            DB::table('password_resets')->where('email', $request->input('email'))->delete();
                            return view('token',['token'=>$token,'error'=>'Contraseña cambiada.','status'=>'success']);
                        }else{
                            return view('token',['token'=>$token,'error'=>'Usuario no encontrado.','status'=>'warning']);
                        }
                    }else{
                        return view('token',['token'=>$token,'error'=>'Token no coincide.','status'=>'warning']);
                    }
                }else{
                    return view('token',['token'=>$token,'error'=>'Token no coincide.','status'=>'warning']);
                }
            }
        }catch (\Exception $e){
            return view('token',['token'=>$token,'error'=>$e->getMessage(),'status'=>'danger']);
        }
    }
}
