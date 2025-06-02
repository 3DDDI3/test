<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\Passport\ClientController;
use App\Http\Controllers\Passport\PersonalAcccesTokenController;
use App\Http\Controllers\Passport\ScopeController;
use App\Http\Controllers\Passport\TokenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('user-details', [UserController::class, 'userDetails']);
});

Route::prefix('passport')
    ->middleware('auth:api')
    ->name('passport')
    ->group(function () {
        Route::post('token', [TokenController::class, 'create']);
        Route::post('token/refresh', [TokenController::class, 'refresh']);
        Route::get('tokens', [TokenController::class, 'index']);
        Route::delete('tokens/{token_id}', [TokenController::class, 'delete']);

        Route::prefix('clients')->group(function () {
            Route::get('/', [ClientController::class, 'index']);
            Route::post('/', [ClientController::class, 'create']);
            Route::put('{client_id}', [ClientController::class, 'update']);
            Route::delete('{client_id', [ClientController::class, 'delete']);
        });

        Route::get('scopes', [ScopeController::class, 'index']);

        Route::prefix('personal-access-tokens')
            ->group(function () {
                Route::get('/', [PersonalAcccesTokenController::class, 'index']);
                Route::post('/', [PersonalAcccesTokenController::class, 'create']);
                Route::delete('{token_id}', [PersonalAcccesTokenController::class, 'delete']);
            });
    });

Route::prefix('orders')
    ->middleware('auth:api')
    ->group(function () {
        Route::post('{order_id}/worker', [OrderController::class, 'attachWorker']);
        Route::patch('{order_id}', [OrderController::class, 'refreshOrderStatus']);
    });

Route::prefix('workers')
    ->middleware('auth:api')
    ->group(function () {
        Route::get('', [WorkerController::class, 'index']);
    });
