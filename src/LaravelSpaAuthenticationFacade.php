<?php

namespace Gostavocms\LaravelSpaAuthentication;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Gostavocms\LaravelSpaAuthentication\Skeleton\SkeletonClass
 */
class LaravelSpaAuthenticationFacade extends Facade
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
