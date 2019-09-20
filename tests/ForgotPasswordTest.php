<?php

namespace Gostavocms\LaravelSpaAuth\Tests;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Gostavocms\LaravelSpaAuth\Notifications\ResetPasswordNotification;

class ForgotPasswordTest extends TestCase
{
    /** @test */
    public function send_reset_link_email()
    {
        $this->withoutExceptionHandling();

        Notification::fake();

        $this->json('POST', config('gostavocms-spa-auth.forgot_password.path'), [
            'email' => 'jdoe@gmail.com',
        ])->assertStatus(200);

        Notification::assertSentTo(
            $this->user,
            ResetPasswordNotification::class
        );
    }

    /** @test */
    public function a_user_can_reset_their_password()
    {
        $this->withoutExceptionHandling();

        $email = 'jdoe@gmail.com';

        $key = $this->app['config']['app.key'];

        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }

        $token = hash_hmac('sha256', Str::random(40), $key);

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        $this->json('POST', config('gostavocms-spa-auth.reset_password.path'), [
            'email' => $email,
            'token' => $token,
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ])->assertStatus(200);
    }
}
