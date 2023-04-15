<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\LoginRequest;
use App\Http\Requests\user\RegisterRequest;
use App\Services\user\ForgotPasswordService;
use App\Services\user\LoginService;
use App\Services\user\RegisterService;
use App\Services\user\ResetPasswordService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $token = LoginService::run($request);

        return response()->json($token, 200);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return response()->json("Usuário deslogado", 200);
    }

    public function register(RegisterRequest $request)
    {
        $newClient = RegisterService::run($request);

        return response()->json($newClient, 201);
    }

    public function forgot(Request $request)
    {
        ForgotPasswordService::run($request);

        return response()->json('Um link de redefinição foi enviado para o seu e-mail.');
    }

    public function reset(Request $request)
    {
        ResetPasswordService::run($request);

        return response()->json("Senha redefinida com sucesso", 200);
    }
}
