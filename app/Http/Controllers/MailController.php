<?php

namespace App\Http\Controllers;

use App\Models\Gmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\GmailController;

class MailController extends Controller
{
    public function sendEmail(Request $request){

        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $gmail = new Gmail();
        $gmail->email = $request->email;
        $gmail->verification_code = sha1(time());
        $gmail->save();

        if($gmail != null){
            GmailController::sendVerifyEmail($gmail->email, $gmail->verification_code);
            return redirect()->back()->with(session()->flash('alert-success', 'Please check email for verification link.'));
        }
        
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
        
    }

    public function verify(Request $request){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $gmail = Gmail::where(['verification_code' => $verification_code])->first();
        
        if($gmail != null){
            $gmail->is_verified = 1;
            $gmail->save();
            
                GmailController::sendComic($gmail->email);
                return redirect()->back()->with(session()->flash('alert-success', 'Successfully sent comic!'));
        
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
    }
}
