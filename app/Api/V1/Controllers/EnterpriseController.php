<?php

namespace App\Api\V1\Controllers;

use App\Enterprise;
use App\Enterprise_User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use \Tymon\JWTAuth\Facades\JWTAuth;


class EnterpriseController extends Controller
{
    //
    public function get_AllEnterprises(){
        $enterprises = Enterprise::where('extend',null)->get();
        return \response()->json(['enterprises'=>$enterprises],200);
    }
    public function get_EnterpriseByID($id){
        try{
            return Enterprise::findOrFail($id);
        }catch (ModelNotFoundException $e){
            return \response()->json(['error'=>['message'=>'User Not Found','status_code'=>404]],404);
        }
    }
    public function delete_EnterpriseByID($id){
        try{
            $enterprise = Enterprise::findOrFail($id);
            $enterprise->delete();
            return \response()->json(['enterprise'=>'deleted'],200);
        }catch (ModelNotFoundException $e){
            return \response()->json(['error'=>['message'=>'User Not Found','status_code'=>404]],404);
        }
    }
    public function delete_User_From_Enterprise_By_ID_User($idE,$idU){
        try{
            $user = JWTAuth::parseToken()->authenticate();
            if($user->role == 1){
                $id = Enterprise_User::where('id_user',$idU)->where('id_enterprise',$idE)->delete();
                if($id > 0){
                    return \response()->json(['user'=>'deleted'],200);
                }else{
                    return \response()->json(['error'=>['message'=>$id,'status_code'=>404]],400);
                }
            }else{
                return \response()->json(['error'=>['message'=>'No tienes permiso.','status_code'=>401,'user'=>$user]],401);
            }
        }catch (ModelNotFoundException $e){
            return \response()->json(['error'=>['message'=>'User Not Found','status_code'=>404]],404);
        }
    }
    public function create_Enterprise(Request $request){
        $validator = Validator::make($request->all(),Enterprise::$rules['create']);
        if($validator->fails()){
            return \response()->json(['error'=>['message'=>$validator->errors()->all(),'status_code'=>400]],400);
        }
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $path = realpath(base_path('public/storage/'));
            $extension = '.'.$file->guessClientExtension();
            $namefile = md5(''.Carbon::now()->timestamp).$extension;
            $request->file('photo')->move($path,$namefile);
            $enterprise = new Enterprise();
            $enterprise->fill($request->all());
            $enterprise->photo = '/storage/'.$namefile;
            try{
                $enterprise->saveOrFail();
                return \response()->json($enterprise,201);
            }catch (\Exception $e){
                return \response()->json(['error'=>['message'=>$e->getMessage(),'status_code'=>$e->getCode()]],400);
            }
        }
        try{
            $enterprise = Enterprise::create($request->all());
            return \response()->json($enterprise,201);
        }catch (\Exception $e){
            return \response()->json(['error'=>['message'=>$e->getMessage(),'status_code'=>$e->getCode()]],400);
        }
    }
    public function add_User(Request $request){
        $validator = Validator::make($request->all(),Enterprise_User::$rules['create']);
        if($validator->fails()){
            return \response()->json(['error'=>['message'=>$validator->errors()->all(),'status_code'=>400]],400);
        }
        try{
            $enterprise = Enterprise_User::create($request->all());
            return \response()->json($enterprise,201);
        }catch (\Exception $e){
            return \response()->json(['error'=>['message'=>$e->getMessage(),'status_code'=>$e->getCode()]],400);
        }
    }
    public function put_Enterprise(Request $request,$id){
        $validator = Validator::make($request->all(),Enterprise::$rules['update']);
        if($validator->fails()){
            return \response()->json(['error'=>['message'=>$validator->errors()->all(),'status_code'=>400]],400);
        }
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $path = realpath(base_path('public/storage/'));
            $extension = '.'.$file->guessClientExtension();
            $namefile = md5(''.Carbon::now()->timestamp).$extension;
            $request->file('photo')->move($path,$namefile);
            try{
                $enterprise = Enterprise::findOrFail($id);
                $enterprise->fill($request->all());
                $enterprise->photo = '/storage/'.$namefile;
                $enterprise->saveOrFail();
                return \response()->json($enterprise,200);
            }catch (\Exception $e){
                return \response()->json(['error'=>['message'=>$e->getMessage(),'status_code'=>$e->getCode()]],400);
            }
        }
        try{
            $enterprise = Enterprise::findOrFail($id);
            $enterprise->fill($request->all());
            $enterprise->saveOrFail();
            return \response()->json($enterprise,201);
        }catch (\Exception $e){
            return \response()->json(['error'=>['message'=>$e->getMessage(),'status_code'=>$e->getCode()]],400);
        }
    }
}
