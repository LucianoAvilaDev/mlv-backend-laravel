<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



    Route::get('/', function () {
        return 'API running on port 8000';
    });

    Route::get('/unauthenticated', function () {
        return response()->json('Usuário não autenticado', 401);
    })->name('unauthenticated');

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/forgot', [AuthController::class, 'forgot'])->name('forgot');

    Route::get('/get-auth-user', function () {
        return response()->json(Auth::user());
    })->name('register');

    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

        Route::resource('/users', UserController::class)
            ->middleware('admin')
            ->except(['create', 'edit']);

        Route::resource('/clients', ClientController::class)
            ->only(['store', 'show', 'update']);

        Route::resource('/purchases', PurchaseController::class)
            ->middleware('admin')
            ->except(['create', 'edit']);

        Route::get('/user-purchases', [GetUserPurchasesController::class])
            ->name('user.purchases');
    });

    Route::get('/products', [ProductController::class, 'getAllProducts'])->name('products.getAll');

    Route::get('/products/{id}/{provider}', [ProductController::class, 'getOneProduct'])->name('products.getOne');


