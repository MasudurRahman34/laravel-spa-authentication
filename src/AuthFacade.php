<?php

namespace Gostavocms\LaravelSpaAuth;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Gostavocms\LaravelSpaAuthentication\Skeleton\SkeletonClass
 */
class AuthFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-spa-authentication';
    }
}
