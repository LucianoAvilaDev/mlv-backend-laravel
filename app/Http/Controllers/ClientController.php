<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();

            $validatedUser = $request->validated();
            $validatedUser->password = Hash::make($request['password']);
            $validatedUser->is_admin = false;
            $newUser = User::create($validatedUser);

            DB::commit();

            return response()->json($newUser, 201);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json("Erro ao criar registro", 500);
        }
    }

    public function show()
    {
        return Auth::user();
    }

    public function update(UpdateUserRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::find(Auth::user()->id);

            $validatedUser = $request->validated();
            $validatedUser->password = $user->password == $user->password
                ? $user->password
                : Hash::make($request['password']);
            $validatedUser->is_admin = false;

            $updatedUser = $user->update($validatedUser);

            DB::commit();

            return response()->json($updatedUser, 201);

        } catch (\Exception $e) {
            DB::rollback();

            return response()->json("Erro ao editar registro", 500);
        }
    }

}
