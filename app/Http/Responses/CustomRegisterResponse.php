<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse;

class CustomRegisterResponse implements RegisterResponse
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function toResponse($request)
    {
        return redirect()->route('admin.user.index')->with('success', 'Utilisateur créé avec succès');
    }
}
