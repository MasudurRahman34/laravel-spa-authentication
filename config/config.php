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
        ]
    ],

    'models' => [
        // The model you want to use as User model. Most likely this will be change to App\User.
        'user' => Gostavocms\LaravelSpaAuth\Models\User::class,
    ],    
];
