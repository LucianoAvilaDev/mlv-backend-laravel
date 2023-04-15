<?php

namespace App\Services\user;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordService
{
    public static function run(Request $request)
    {
         $credentials = $request->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $resetPasswordStatus = Password::reset($credentials, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($resetPasswordStatus == Password::INVALID_TOKEN) {
            throw new HttpResponseException(response()->json("Token inválido", 400));
        }

        return true;
    }
}
