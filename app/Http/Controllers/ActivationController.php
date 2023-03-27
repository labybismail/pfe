<?php

namespace App\Http\Controllers;

use App\Mail\ActivateYourAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ActivationController extends Controller
{
    public function activationUserAccount($code){
        $user=User::whereCode($code)->first();
        $user->code=null;
        $user->update([
            "active"=>1
            ]);
            Auth::login($user);
            return redirect("/")->withSuccess("connecte");
    }
    public function resendActivationCode($email){
        $user=User::whereCode($email)->first();
        if($user && $user->active){
            return redirect("/");

        }
        if ($user) {
            Mail::to($user)->send(new ActivateYourAccount($user->code));
        }    return redirect("/login")->withSuccess("le lien d'activation est envoye");
    }
}
