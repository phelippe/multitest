<?php

namespace Multitest\OAuth2;


use Illuminate\Support\Facades\Auth;

class MotoristaPasswordVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        #dd('motorista password verifier');
        /*if (Auth::once($credentials)) {
            return Auth::user()->id;
        }*/
        if (Auth::motorista()->once($credentials)) {

            #dd(Auth::cliente()->get()->id);
            return Auth::motorista()->get()->id;
        }

        return false;
    }
}