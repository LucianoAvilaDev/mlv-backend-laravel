<?php

namespace App\Services\user;

use App\Http\Requests\user\StoreUserRequest;
use App\Models\User;
use Error;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoreUserService
{
    public static function run(StoreUserRequest $request, bool $isAdmin = null)
    {
        try {
            DB::beginTransaction();

            $validatedUser = $request->validated();
            $validatedUser['password'] = Hash::make($request['password']);
            $validatedUser['is_admin'] = $isAdmin ?? $request['is_admin'];

            $newUser = User::create($validatedUser);

            DB::commit();

            return $newUser;

        } catch (\Exception $e) {
            DB::rollback();

            throw new Error("Erro ao criar registro");
        }
    }
}
