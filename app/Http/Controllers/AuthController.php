<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $token['type'] = 'bearer';
            $token['token'] = $user->createToken('token')->plainTextToken;

            return response()->json($token, 200);
        }

        return response()->json("Usuário inválido", 400);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return response()->json("Usuário deslogado", 200);
    }
}