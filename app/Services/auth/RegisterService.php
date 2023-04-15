<?php

namespace App\Services\auth;

use App\Http\Requests\user\RegisterRequest;
use App\Models\User;
use Error;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public static function run(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            $validatedUser = $request->validated();

            $validatedUser['password'] = Hash::make($request['password']);
            $validatedUser['is_admin'] = false;

            $newUser = User::create($validatedUser);

            DB::commit();

            return $newUser;

        } catch (\Exception $e) {
            DB::rollback();

            throw new Error("Erro ao criar registro");
        }
    }
}
