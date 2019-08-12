<?php

namespace Gostavocms\LaravelSpaAuth\Tests;

use Illuminate\Support\Str;
use Laravel\Passport\PassportServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Gostavocms\LaravelSpaAuth\Tests\Models\User;
use Gostavocms\LaravelSpaAuth\AuthServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends Orchestra
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            AuthServiceProvider::class,
            PassportServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app['config']->set('auth.providers.users.model', User::class);
        $app['config']->set('app.key', Str::random(32));
        $app['config']->set('auth.guards.api.driver', 'passport');
    }

    /**
     * Set up the database.
     */
    protected function setUpDatabase()
    {
        $this->loadLaravelMigrations();
        $this->artisan('passport:install');

        User::create([
            'name' => 'John Doe',
            'email' => 'jdoe@gmail.com',
            'password' => bcrypt('qwerty'),
        ]);
    }
}
