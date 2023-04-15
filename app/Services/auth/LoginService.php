<?php

namespace App\Services\auth;

use App\Http\Requests\user\LoginRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public static function run(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $token['type'] = 'bearer';
            $token['token'] = $user->createToken('token')->plainTextToken;

            return $token;
        }

        throw new HttpResponseException(response()->json("Usuário inválido", 400));
    }
}
