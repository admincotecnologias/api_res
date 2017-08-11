<?php

namespace App\Api\V1\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App;
use Illuminate\Httpresponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use \Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Files;

class FormatController extends Controller
{
    //
    public function get_All()
    {
        $formats = App\Format::all();
        return response()->json($formats,200);
    }
    public function get_ByIDFormat($id){
        try{
            $format = App\Format::where('id',$id)->firstOrFail();
            return response()->json([
                'format' => $format
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'error' =>[
                    'message' => $e->getMessage(),
                    'status_code'=> 404
                ]
            ],404);
        }
    }
    public function get_By_Enterprise($id){
        try{
            $formats = App\Format::where('id_enterprise',$id)->orderBy('id_week','desc')->get();
            return response()->json([
                'formats' => $formats
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'error' =>[
                    'message' => $e->getMessage(),
                    'status_code'=> 404
                ]
            ],404);
        }
    }
    public function get_By_User($id){
        try{
            $formats = App\Format::where('id_user',$id)->orderBy('id_week','desc')->get();
            return response()->json([
                'formats' => $formats
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'error' =>[
                    'message' => $e->getMessage(),
                    'status_code'=> 404
                ]
            ],404);
        }
    }
    public function get_By_Week($id){
        try{
            $formats = App\Format::where('id_week',$id)->orderBy('id_enterprise','desc')->get();
            return response()->json([
                'formats' => $formats
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'error' =>[
                    'message' => $e->getMessage(),
                    'status_code'=> 404
                ]
            ],404);
        }
    }
    public function get_By_Week_Enterprise($idW,$idE){
        try{
            $formats = App\Format::where('id_week',$idW)->where('id_enterprise',$idE)->orderBy('id_user','desc')->get();
            return response()->json([
                'formats' => $formats
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'error' =>[
                    'message' => $e->getMessage(),
                    'status_code'=> 404
                ]
            ],404);
        }
    }
    public function get_Current_Week(){
        try{
            $idW = App\Week::orderBy('id','desc')->first();
            $formats = App\Format::where('id_week',$idW->id)->orderBy('id_enterprise','desc')->get();
            return response()->json([
                'formats' => $formats
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'error' =>[
                    'message' => $e->getMessage(),
                    'status_code'=> 404
                ]
            ],404);
        }
    }
    public function get_By_Enterprise_User($idE,$idU){
        try{
            $formats = App\Format::where('id_week',$idU)->where('id_enterprise',$idE)->orderBy('id_week','desc')->get();
            return response()->json([
                'formats' => $formats
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'error' =>[
                    'message' => $e->getMessage(),
                    'status_code'=> 404
                ]
            ],404);
        }
    }
    public function get_By_Week_Enterprise_User($idW,$idE,$idU){
        try{
            $formats = App\Format::where('id_week',$idW)->where('id_enterprise',$idE)->where('id_user',$idU)->firstOrFail();
            return response()->json([
                'formats' => $formats
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'error' =>[
                    'message' => $e->getMessage(),
                    'status_code'=> 404
                ]
            ],404);
        }
    }
    public function post_Create(Request $request){
        $validator = Validator::make($request->all(),App\Format::$rules['create']);
        if($validator->fails()){
            return response()->json(['error'=>['message'=>$validator->errors()->all(),'status_code'=>400]],400);
        }
        try{
            $format = App\Format::create($request->all());
            return response()->json([
                'formats' => $format
            ],201);
        }catch(\Exception $e){
            return response()->json([
                'error' =>[
                    'message' => $e->getMessage(),
                    'status_code'=> 404
                ]
            ],404);
        }
    }
    public function put_Actualizar(Request $request,$id){
        $validator = Validator::make($request->all(),App\Format::$rules['update']);
        if($validator->fails()){
            return response()->json(['error'=>['message'=>$validator->errors()->all(),'status_code'=>400]],400);
        }
        try{
            $format = App\Format::findOrFail($id);
            $format->fill($request->all());
            $format->saveOrFail();
            return response()->json([
                'formats' => $format
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'error' =>[
                    'message' => $e->getMessage(),
                    'status_code'=> 404
                ]
            ],404);
        }
    }
    public function get_All_Weeks(){
        $weeks = App\Week::all();
        return response()->json(['weeks'=>$weeks],200);
    }
    public function post_Weeks_Between_Two_Dates(Request $request){
        try{
            $date_start = Carbon::parse($request->input('start_date'));
            $end_date = Carbon::parse($request->input('end_date'));
            $weeks = DB::table('week')
                ->whereDate('start_date','>=',$date_start->toDateString())
                ->whereDate('start_date','<=',$end_date->toDateString())
                ->get();
            return response()->json(['weeks'=>$weeks],200);
        }catch (\Exception $e){
            response(
                [
                'error'=>[
                    'message'=>$e->getMessage(),
                    'status_code' => 500
                ]
                ],500);
        }
    }
    public function post_File(Request $data){

        //
        $validator = Validator::make($data->all(),[
            'id_format'=> 'required|numeric|exists:format,id'
        ]);
        if($validator->fails()){
            $failed = $validator->failed();
            if(isset($failed['id_format']['Required'])){
                return response()->json(['error'=>true,'message' => 'Falto especificar el id del formato.']);
            }
            if(isset($failed['id_format']['Exists'])){
                return response()->json(['error'=>true,'message' => 'ID del formato no existe.']);
            }
        }


        if ($data->hasFile('file')) {
            //
            $file = $data->file('file');
            $path = realpath(base_path('public/storage/'));
            $extension = '.'.$file->guessClientExtension();
            $namefile = md5("".Carbon::now()->timestamp).$extension;
            $data->file('file')->move($path,$namefile);
            $filedb = new App\Files;
            $filedb->name = $data->file('file')->getClientOriginalName();
            $filedb->id_format = (int)$data->input('id_format');
            $filedb->path = '/storage/'.$namefile;
            $filedb->mime = $data->file('file')->getClientMimeType();
            $filedb->extension = $extension;
            $filedb->type = $data->input('type');
            $filedb->save();

            return response()->json(['error'=>false,'message'=>'Archivo guardado.','file'=>$filedb]);
        }
        return response()->json(['error'=>true,'message'=>'Archivo Invalido.','file'=>null]);
    }
}
