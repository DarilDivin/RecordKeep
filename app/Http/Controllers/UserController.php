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
        return view('auth.change-password');
    }

    public function changePassword(ChangePasswordRequest $request) {

        $password = Hash::make($request->validated('password'));
        $user = User::where('id', Auth::user()->id);

        $user->update([
            'password' => $password,
            'haschangedpwd' => 1,
        ]);
        return redirect()->route('home');
    }
}
