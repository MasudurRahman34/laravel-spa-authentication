<?php

namespace Gostavocms\LaravelSpaAuth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Instantiate a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api')->only('logout');
    }

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
            'remember' => $request->remember,
        ];
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->forceDelete();

        return [
            'success' => true
        ];
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return config('gostavocms-spa-auth.login.username');
    }
}
