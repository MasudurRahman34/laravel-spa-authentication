<?php

namespace Gostavocms\LaravelSpaAuth\Http\Controllers;

use Illuminate\Routing\Controller;

class TestController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return [
            'status' => 'success',
        ];
    }
}
