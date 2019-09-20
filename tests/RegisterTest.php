<?php

namespace Gostavocms\LaravelSpaAuth\Tests;

class RegisterTest extends TestCase
{
    /** @test */
    public function a_user_can_register()
    {
        //$this->withoutExceptionHandling();

        $this->json(
            'POST',
            config('gostavocms-spa-auth.register.path'),
            [
                'name' => 'Jane Doe',
                'email' => 'janedoe@gmail.com',
                'password' => 'qwertyui',
                'password_confirmation' => 'qwertyui',
            ]
        )
        ->assertStatus(200)
        ->assertJsonStructure(['user', 'token']);

        // Login the new registered user.
        $this->json('POST', config('gostavocms-spa-auth.login.path'), [
                'email' => 'janedoe@gmail.com',
                'password' => 'qwertyui',
            ])
            ->assertStatus(200)
            ->assertJsonStructure(['user', 'token', 'remember']);
    }
}
