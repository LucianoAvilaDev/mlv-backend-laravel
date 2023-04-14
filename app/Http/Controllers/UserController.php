<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return response()->json($users, 200);
    }

    public function store(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();

            $validatedUser = $request->validated();
            $validatedUser['password'] = Hash::make($request['password']);
            $newUser = User::create($validatedUser);

            DB::commit();

            return response()->json($newUser, 201);

        } catch (\Exception $e) {
            DB::rollback();

            return response()->json("Erro ao criar registro:" . $e, 200);
        }
    }

    public function show(User $user)
    {
        return response()->json($user, 200);
    }

    public function update(UpdateUserRequest $request, User $user)
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
                return response()->noContent(200);
            }

            throw new \Exception();

        } catch (\Exception $e) {
            DB::rollback();

            return response()->json("Erro ao editar registro", 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();

            $deletedUser = $user->delete();

            if ($deletedUser) {
                DB::commit();
                return response()->json('', 204);
            }

            throw new \Exception();
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json('Não foi possível excluir o Usuário', 500);
        }
    }
}