<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MailBiHtml;
use App\Mail\MailPasswordBi;
use App\Mail\SenderHtml;
use App\Mail\TemplateMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Container\Container;
use Illuminate\Mail\Markdown;

class MailerController extends Controller
{
    //
    public function post_Mail_Single(Request $request){
        try{
            Mail::bcc(['enrique.moya08@gmail.com','miguelreina@gmail.com'])->send(new MailPasswordBi("shokoshabo"));
            return response()->json(['message'=>'ok'],200);
        }catch (\Exception $e){
            return response()->json(['error'=>['code'=>$e->getCode(),'line'=>$e->getLine(),'message'=>$e->getMessage()]]);
        }
    }
    public function post_Mail_Html_Single(Request $request){
        try{
            $html = $request->input('content');
            $to = array($request->input('to'));
            $subject = $request->input('subject');
            foreach ($to as $item){
                Mail::to($item)->send(new SenderHtml($html,$subject));
            }
            return response()->json(['message'=>'ok'],200);
        }catch (\Exception $e){
            return response()->json(['error'=>['code'=>$e->getCode(),'line'=>$e->getLine(),'message'=>$e->getMessage()]]);
        }
    }
    public function post_Mail_Password_Bi(Request $request){
        try{
            $pass = $request->input('password');
            $to =$request->input('to');
            Mail::bcc($to)->send(new MailPasswordBi($pass));
            return response()->json(['message'=>'ok'],200);
        }catch (\Exception $e){
            return response()->json(['error'=>['code'=>$e->getCode(),'line'=>$e->getLine(),'message'=>$e->getMessage()]],400);
        }
    }
    public function post_Mail_Bi(Request $request){
        try{
            $content = $request->input('content');
            $to =$request->input('to');
            $subject = $request->input('subject');
            Mail::bcc($to)->send(new MailBiHtml($content,$subject));
            return response()->json(['message'=>'ok'],200);
        }catch (\Exception $e){
            return response()->json(['error'=>['code'=>$e->getCode(),'line'=>$e->getLine(),'message'=>$e->getMessage()]],400);
        }
    }
}
