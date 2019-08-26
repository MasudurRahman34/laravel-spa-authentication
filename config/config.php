<?php

return [    
    // Login related configuration.
    'login' => [
        'uri' => 'api/login',

        // The field in the users table that is being used for login together with password.
        'username' => 'email',
    ],

    // Logout related configuration
    'logout' => [
        'uri' => 'api/logout',
    ],

    // Registration related configuration
    'register' => [
        'uri' => 'api/register',

        // This will be used as validation rules in user registration.
        'rules' => [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
    ],


    // Forgot Password
    'forgot_password' => [
        'uri' => 'api/password/email'
    ],

    'reset_password_url' => env('FRONTEND_URL', 'http://localhost') . '/password/reset',
];
