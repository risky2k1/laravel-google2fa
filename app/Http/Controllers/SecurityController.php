<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FAQRCode\Google2FA;
use PragmaRX\Google2FAQRCode\Google2FA as Google2FAQR;
use PragmaRX\Google2FA\Google2FA as G2FA;
class SecurityController extends Controller
{
    public function showGoogle2faForm()
    {
        $user = Auth::user();
        if (Auth::user()->google2fa_secret !=null){
            return redirect()->route('dashboard');
        }
        $google2fa = app('pragmarx.google2fa');

        $secret=$google2fa->generateSecretKey();

        $google2fa_qr = new Google2FA();

        $qr_image = $google2fa_qr->getQRCodeInline(
            config('app.name'),
            $user->email,
            $secret,
        );

        return view('layouts.google2fa.register',[
            'secret'=>$secret,
            'qr_image'=>$qr_image,
        ]);
    }

    public function google2faRegister(Request $request)
    {
        $user = Auth::user();
        $user->update([
           'google2fa_secret'=>$request->secret,
        ]);
        return redirect()->route('dashboard');
    }

//    public function google2faAuthenticate(Request $request)
//    {
//        $google2fa = new G2FA();
//
//        $user = Auth::user();
//
//        $secret = $request->input('secret');
//
//        $valid = $google2fa->verifyKey($user->google2fa_secret, $secret);
//
//        if ($valid){
//            return redirect()->route('dashboard');
//        }
//        return redirect()->back()->withErrors(['errors'=>'Sai code']);
//    }
}
