<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerifycationController extends Controller
{
    public function verifyEmailView(){
        return view('auth.verify-email');
    }

    public function sendEmail(EmailVerificationRequest $request){
        $request->fulfill();
    
        return redirect('/');
    }

    public function verifyEmail(Request $request){

        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('message', 'Verification link sent!');
    }
}
