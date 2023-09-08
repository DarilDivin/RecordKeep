<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Laravel\Fortify\Features;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Http\Responses\CustomRegisterResponse;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

class AdminRegisteredUserController extends RegisteredUserController
{
    // use RegistersUsers;

    protected $guard;

    public function __construct()
    {
        if (Features::enabled(Features::registration())) {
            // $this->middleware(IsAdmin::class);
            // $this->middleware('auth');
        }
    }

    /**
     * Create a new registered user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\CreatesNewUsers  $creator
     * @return RegisterResponse
     */
    public function store(Request $request,
                          CreatesNewUsers $creator): RegisterResponse
    {
        event(new Registered($user = $creator->create($request->all())));

        // $this->guard->login($user);

        return app(CustomRegisterResponse::class);
    }
}
