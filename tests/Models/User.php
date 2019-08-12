<?php

namespace Gostavocms\LaravelSpaAuth\Tests\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    protected $guarded = [];
} 