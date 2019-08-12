<?php

namespace Gostavocms\LaravelSpaAuth\Tests;

use Gostavocms\LaravelSpaAuth\Tests\Models\User;

class LoginTest extends TestCase
{
    /** @test */
    public function a_user_can_login_using_username_and_password()
    {
        $this->withoutExceptionHandling();       

        $response = $this->post(config('routes.login'), [
                'email' => 'jdoe@gmail.com',
                'password' => 'qwerty',
            ]);
        
        $response->assertStatus(200)
            ->assertJsonStructure(['user', 'token', 'remember']);

        $this->withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$response->getData()->token,
            ])
            ->get('test')
            ->assertStatus(200);
    }

    /** @test */
    public function a_user_must_be_authenticated_to_access_test_controller()
    {
        $this->json('GET', 'test')
            ->assertUnauthorized();
    }
}
