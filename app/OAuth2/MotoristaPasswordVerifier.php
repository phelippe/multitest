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
        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}