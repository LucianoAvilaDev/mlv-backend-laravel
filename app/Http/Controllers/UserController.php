<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Models\User;
use App\Services\user\DeleteUserService;
use App\Services\user\StoreUserService;
use App\Services\user\UpdateUserService;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return response()->json($users, 200);
    }

    public function store(StoreUserRequest $request)
    {
        $newUser = StoreUserService::run($request);

        return response()->json($newUser, 201);
    }

    public function show(User $user)
    {
        return response()->json($user, 200);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        UpdateUserService::run($request, $user);

        return response()->noContent(200);
    }

    public function destroy(User $user)
    {
        DeleteUserService::run($user);

        return response()->noContent(204);
    }
}
