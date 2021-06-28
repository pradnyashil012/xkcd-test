<?php

namespace App\Http\Controllers;
use App\Mail\Email;
use App\Mail\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class GmailController extends Controller
{
    public static function sendVerifyEmail($email, $verification_code){
        $data = [
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new Email($data));
    }
    
    public static function sendComic($email){
        $cid = rand(0, 1000);
        $comic = Http::get("https://xkcd.com/".$cid."/info.0.json")->json();
        $sub = $comic['safe_title'];
        
        Mail::to($email)->send(new Comic($comic, $sub));
        
    }
}
