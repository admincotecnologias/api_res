<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
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
            Mail::to('enrique.moya08@gmail.com')->send(new TemplateMail());
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
}
