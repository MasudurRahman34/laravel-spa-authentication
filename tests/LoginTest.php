<?php

namespace Gostavocms\LaravelSpaAuth\Tests;

class LoginTest extends TestCase
{
    /** @test */
    public function a_user_can_login_using_username_and_password()
    {
        $this->withoutExceptionHandling();

        $response = $this->json('POST', config('gostavocms-spa-auth.login.uri'), [
                'email' => 'jdoe@gmail.com',
                'password' => 'qwerty',
            ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['user', 'token', 'remember']);

        $this->withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$response->getData()->token,
            ])
            ->json('GET', 'gostavocms-spa-auth-test')
            ->assertStatus(200);
    }

    /** @test */
    public function a_user_must_be_authenticated_to_access_test_controller()
    {
        $this->json('GET', 'gostavocms-spa-auth-test')
            ->assertStatus(401);
    }

    /** @test */
    public function a_user_can_logout()
    {
        //$this->withoutExceptionHandling();

        // Login
        $response = $this->json('POST', config('gostavocms-spa-auth.login.uri'), [
                'email' => 'jdoe@gmail.com',
                'password' => 'qwerty',
            ]);

        $token = $response->getData()->token;

        //Logout
        $this->withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$token,
            ])
            ->json('POST', config('gostavocms-spa-auth.logout.uri'))
            ->assertStatus(200);
    }

    /** @test */
    public function a_user_must_be_logged_in_to_logout()
    {
        $this->json('POST', config('gostavocms-spa-auth.logout.uri'))
            ->assertStatus(401);
    }
}
