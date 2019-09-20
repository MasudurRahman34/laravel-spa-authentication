<?php

return [
    // Login related configuration.
    'login' => [
        'path' => 'api/login',

        // The field in the users table that is being used for login together with password.
        'username' => 'email',
    ],

    // Logout related configuration
    'logout' => [
        'path' => 'api/logout',
    ],

    // Registration related configuration
    'register' => [
        'path' => 'api/register',

        // This will be used as validation rules in user registration.
        'rules' => [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
    ],

    // Forgot Password
    'forgot_password' => [
        'path' => 'api/password/email',
    ],

    // Reset Password
    'reset_password' => [
        'path' => 'api/password/reset',

        // This will be used as validation rules in user reset password.
        'rules' => [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ],
    ],

    'reset_password_url' => env('APP_FRONTEND_URL', 'http://localhost').'/password/reset',
];
