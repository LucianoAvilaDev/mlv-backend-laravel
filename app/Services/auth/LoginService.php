<?php

namespace App\Services\auth;

use App\Http\Requests\auth\LoginRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public static function run(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $response['type'] = 'bearer';
            $response['user'] = $user;
            $response['token'] = $user->createToken('token')->plainTextToken;

            return $response;
        }

        throw new HttpResponseException(response()->json("Usuário inválido", 400));
    }
}
