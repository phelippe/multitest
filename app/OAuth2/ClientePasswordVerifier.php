<?php

namespace Multitest\OAuth2;


use Illuminate\Support\Facades\Auth;

class ClientePasswordVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        #dd(Auth::getProvider()->retrieveByCredentials($credentials)->id);
        #dd('cliente password verifier');
        if (Auth::cliente()->once($credentials)) {

            #dd(Auth::cliente()->get()->id);
            return Auth::cliente()->get()->id;
        }

        return false;
    }
}