<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Services\auth\LoginService;
use App\Services\auth\ForgotPasswordService;
use App\Services\auth\RegisterService;
use App\Services\auth\ResetPasswordService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $response = LoginService::run($request);

        return response()->json($response, 200);
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
