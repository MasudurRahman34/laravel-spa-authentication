<?php

namespace Gostavocms\LaravelSpaAuth\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        $user = $this->guard()->user();

        $user->tokens()->delete();

        return [
            'user' => $user,
            'token' => $user->createToken('Auth Token')->accessToken,
            'remember' => $request->remember
        ];
    }
}