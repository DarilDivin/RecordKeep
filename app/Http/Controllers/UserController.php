<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changePasswordView() {
        if ( Auth::user()->haschangedpwd) return back();
        return view('auth.change-password');
    }

    public function changePassword(ChangePasswordRequest $request) {

        $password = Hash::make($request->validated('password'));
        $user = User::where('id', Auth::user()->id);

        $user->update([
            'password' => $password,
            'haschangedpwd' => true,
        ]);
        return redirect()->intended(route('document.index'));
    }
}
