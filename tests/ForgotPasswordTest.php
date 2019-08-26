<?php

namespace Gostavocms\LaravelSpaAuth\Tests;

use Illuminate\Support\Facades\Notification;
use Gostavocms\LaravelSpaAuth\Notifications\ResetPasswordNotification;

class ForgotPasswordTest extends TestCase
{
    /** @test */
    public function send_reset_link_email()
    {
        $this->withoutExceptionHandling();

        Notification::fake();

        $this->json('POST', config('gostavocms-spa-auth.forgot_password.uri'), [
            'email' => 'jdoe@gmail.com',
        ])->assertStatus(200);

        Notification::assertSentTo(
            $this->user,
            ResetPasswordNotification::class
        );
    }
}
