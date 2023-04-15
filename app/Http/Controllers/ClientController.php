<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\UpdateUserRequest;
use App\Services\user\UpdateUserService;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function show()
    {
        return response()->json(Auth::user(), 200);
    }

    public function update(UpdateUserRequest $request)
    {
        UpdateUserService::run($request, Auth::user());

        return response()->noContent(200);
    }

}
