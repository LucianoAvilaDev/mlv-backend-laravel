<?php

namespace App\Services\user;

use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordService
{
    public static function run(Request $request)
    {
        $credentials = $request->validate(['email' => 'required|email']);

        $user = User::where('email', 'like', $credentials['email'])->get();

        if($user->isEmpty()){
            throw new HttpResponseException(response()->json("Token inválido", 400));
        }

        Password::sendResetLink($credentials);
    }
}
