<?php

namespace App\Services\user;

use App\Http\Requests\user\UpdateUserRequest;
use App\Models\User;
use Error;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateUserService
{
    public static function run(UpdateUserRequest $request, User $user)
    {
        try {
            DB::beginTransaction();

            $validatedUser = $request->validated();
            $validatedUser['password'] = $user['password'] == $user['password']
                ? $user['password']
                : Hash::make($request['password']);

            $updatedUser = $user->update($validatedUser);

            if ($updatedUser) {
                DB::commit();
                return true;
            }

            throw new Error("Erro ao criar registro");

        } catch (\Exception $e) {
            DB::rollback();

            throw new Error("Erro ao criar registro");
        }
    }
}
