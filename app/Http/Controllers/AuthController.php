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
            $user = User::where('email',$request->email);

            $token = $user->createToken('JWT');

            return response()->json($token->plainTextToken(), 200);
        }

        return response()->json("Usuário inválido", 401);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json("Usuário deslogado", 200);
    }
}
