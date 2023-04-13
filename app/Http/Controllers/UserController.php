<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            $validatedUser->password = Hash::make($request['password']);
            $newUser = User::create($validatedUser);

            DB::commit();

            return response()->json($newUser, 201);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json("Erro ao criar registro", 500);
        }
    }

    public function show(User $user)
    {
        if (Auth::user()->is_admin && $user->is_admin == false || $user->id == Auth::user()->id) {
            return response()->json($user, 200);
        }

        return response()->json('Ação não autorizada', 401);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            DB::beginTransaction();

            $validatedUser = $request->validated();
            $validatedUser->password = $user->password == $user->password
                ? $user->password
                : Hash::make($request['password']);

            $updatedUser = $user->update($validatedUser);

            DB::commit();

            return response()->json($updatedUser, 201);

        } catch (\Exception $e) {
            DB::rollback();

            return response()->json("Erro ao editar registro", 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();

            $user->delete();

            DB::commit();

            return response()->json('', 204);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json('Não foi possível excluir o Usuário', 500);
        }
    }
}