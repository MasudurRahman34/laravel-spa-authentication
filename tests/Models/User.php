<?php

namespace Gostavocms\LaravelSpaAuth\Tests\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;

    protected $guarded = [];
}
